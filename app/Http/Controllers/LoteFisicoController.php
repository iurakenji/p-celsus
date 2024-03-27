<?php

namespace App\Http\Controllers;

use App\Models\loteFisico;
use App\Models\Mp;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoteFisicoController extends Controller
{
    public function urgencia(Lote $lote)
    {
        $lote->update(['urgente' => 1]);
        return redirect()->route('loteFisicos.analises_index');
    }

    public function resultado(Lote $lote)
    {
        return view('loteFisicos.resultado', compact('lote'));
    }
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
            $mps = Mp::where(function (Builder $q) use ($chave){
                return $q->where('nome','LIKE', '%'.$chave.'%')
                ->orWhere('nome_fc','LIKE', '%'.$chave.'%')
                ->orWhere('nome_popular','LIKE', '%'.$chave.'%')
                ->orWhere('cas','LIKE', '%'.$chave.'%')
                ->orWhere('codigo','LIKE', '%'.$chave.'%');
            })->paginate(20);
        } else {
            $mps = Mp::paginate(20);
        }
        return view('loteFisicos.mp_index', compact('mps'));
    }

    public function analises_index(Request $request)
    {
        /*$mps =  Mp::select('id')
            ->when(isset($request->chave), function(Builder $q) use ($chave){
                return $q->where('nome','LIKE','%'.$chave.'%')
                ->orWhere('nome_fc','LIKE','%'.$chave.'%')
                ->orWhere('nome_popular','LIKE','%'.$chave.'%')
                ->orWhere('cas','LIKE','%'.$chave.'%')
                ->orWhere('codigo','LIKE','%'.$chave.'%');
            },function(Builder $q){
                return $q->where('nome','LIKE','%');
            })
            ->when($request->forma != 'Todas', function (Builder $q) use ($forma){
                return $q->where('forma', $forma);
            }, function(Builder $q){
                return $q->where('forma','LIKE','%');
            })
            ->when($request->tipo != 'Todos', function (Builder $q) use ($tipo_id){
                return $q->where('tipo_id', $tipo_id);
            }, function(Builder $q){
                return $q->where('tipo','LIKE','%');
            });*/

        $tipo_id = $request->tipo_id;
        $forma = $request->forma;
        $chave = $request->chave;

        if ($request->isMethod('post')) {
            if ($request->chave) {
            $chave = 'nome LIKE "%'.$request->chave.'%"';
            } else {
                $chave = 'nome LIKE "%"';
            }
            if ($request->forma != 'Todas') {
                $chave = $chave.' AND forma = "'.$request->forma.'"';
                }
            if ($request->tipo_id != 'Todos') {
                $chave = $chave.' AND tipo_id = "'.$request->tipo_id.'"';
                }
            if ($request->tratado) {
                $chave = $chave.' AND tratado = 1';
                }
            if ($request->lacto) {
                $chave = $chave.' AND lacto = 1';
                }
            if ($request->tintura) {
                $chave = $chave.' AND tintura = 1';
                }
            if ($request->micronizado) {
                $chave = $chave.' AND micronizado = 1';
                }
            if ($request->colorido) {
                $chave = $chave.' AND colorido = 1';
                }
            if ($request->odor) {
                $chave = $chave.' AND odor = 1';
                }

            $mps = Mp::select('id')->whereRaw($chave);

            $lotes = Lote::whereIn('mp_id', $mps)
            ->where(function (Builder $q) {
                $q->where('situacao', 'Aguardando Conferência')
                ->orWhere('situacao', 'Aguardando Análise');
            })->paginate(20);
            return view('loteFisicos.analises', compact('lotes'));

        } else {
            $lotes = Lote::where(function (Builder $q) {
                $q->where('situacao', 'Aguardando Conferência')
                ->orWhere('situacao', 'Aguardando Análise');
            })
            ->paginate(20);
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
