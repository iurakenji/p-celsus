<?php

namespace App\Http\Controllers;

use App\Models\loteFisico;
use App\Models\Mp;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class LoteFisicoController extends Controller
{
    public function query(string $origem, Request $request)
    {
        if ($origem == 1) {
            $chave = $request->chave;
            return redirect()->route('loteFisicos.index', compact('chave'));
        } elseIf ($origem == 2) {
            $chave = $request->chave;
            return redirect()->route('loteFisicos.mp_index', compact('chave'));
        } 
    }
    
    public function index(string $chave = null)
    {
        if ($chave) {
            $mps = Mp::select('id')->where('nome', 'LIKE', '%'.$chave.'%')
            ->orWhere('nome_fc', 'LIKE', '%'.$chave.'%')
            ->orWhere('nome_popular', 'LIKE', '%'.$chave.'%')
            ->orWhere('cas', 'LIKE', '%'.$chave.'%')
            ->orWhere('codigo', 'LIKE', '%'.$chave.'%');
            $loteFisicos = LoteFisico::select('mp_id')->whereNull('chegada');
            $lotes = Lote::where(function (Builder $query) {
                $query->where('situacao','Aguardando Análise')->orWhere('situacao','Aguardando Conferência');
            })->whereIn('mp_id', $mps)->whereIn('id', $loteFisicos)->orderBy('id')->paginate(15);
        } else {
            $loteFisicos = LoteFisico::select('mp_id')->whereNull('chegada');
            $lotes = Lote::where(function (Builder $query) {
                $query->where('situacao','Aguardando Análise')->orWhere('situacao','Aguardando Conferência');
            })->whereIn('id', $loteFisicos)->orderBy('id')->paginate(15);
        }
        return view('loteFisicos.loteFisicos', compact('lotes'));
    }

    public function mp_index(string $chave = null)
    {
        if ($chave) {
            $mps = Mp::select('id')->whereAny([
                'nome',
                'nome_fc',
                'nome_popular',
                'cas',
                'codigo',
                'lote',
                'nf',
            ],'LIKE', '%'.$chave.'%')->get();
        } else {
            $mps = Mp::paginate(20);
        }
        return view('loteFisicos.mp_index', compact('mps'));
    }

    public function analises_index(Request $request)
    {
        $situacao = $request->situacao;
        $chave = $request->chave;
        if ($request->isMethod('post')) {

        $mps =  Mp::select('id')->where('nome','LIKE','%'.$request->chave.'%')
                ->orWhere('nome_fc','LIKE','%'.$request->chave.'%')
                ->orWhere('nome_popular','LIKE','%'.$request->chave.'%')
                ->orWhere('cas','LIKE','%'.$request->chave.'%')
                ->orWhere('codigo','LIKE','%'.$request->chave.'%')->get();

        $lotes = Lote::when($request->situacao != 'Todas', function(Builder $query) {
                $query->where('situacao', 'Aguardando Análise');
                })
            ->paginate(20);
            return view('loteFisicos.analises', compact('lotes'));
        } else {
            $lotes = Lote::where('situacao', 'Aguardando Análise')->paginate(20);
            return view('loteFisicos.analises', compact('lotes'));
        }
    }

    public function create(Mp $mp)
    {
        return view('loteFisicos.create', compact('mp'));
    }

    public function store(Lote $lote = null, Request $request)
    {
        $usuario = Auth::user();
        if ($request->isMethod('put')){
            if ($lote->situacao == 'Aguardando Conferência') {
                $request->merge(['situacao' => 'Aguardando Análise']);
            } 
            $lote = $lote->update($request->except('_token', '_method', 'bt_salvar'));
            LoteFisico::where('lote_id',$lote)->update(['chegada' => now()]);
        }
        if ($request->isMethod('post')){
            $request->merge(['situacao' => 'Aguardando Conferência']);
            $lote = Lote::create($request->except('_token', '_method', 'bt_salvar'));
            $loteFisico = LoteFisico::create([
                'lote_id' => $lote->id,
                'situacao' => 'Aguardando Conferência',
                'entrada' => now(),
                'chegada' => now(),
                'recebidoPor_id' => $usuario->id,
            ]);
        }
        return redirect()->route('loteFisicos.index');
    }

    public function show(loteFisico $loteFisico)
    {
        //
    }

    public function edit(Lote $lote = null)
    {
        return view('loteFisicos.edit', compact('lote'));
    }

    public function update(Request $request, loteFisico $loteFisico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loteFisico $loteFisico)
    {
        //
    }
}
