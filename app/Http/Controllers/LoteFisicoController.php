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
        $chave = $request->chave;
        if ($origem == 1) {
            return redirect()->route('loteFisicos.index', compact('chave'));
        } else {
            return redirect()->route('loteFisicos.mp_index', compact('chave'));
        }
    }
    
    public function index(string $chave = null)
    {
        if ($chave) {
            $mps = Mp::select('id')->where('nome','like','%'.$chave.'%')->orWhere('nome_fc','like','%'.$chave.'%')->orWhere('nome_popular','like','%'.$chave.'%')->orWhere('cas','like','%'.$chave.'%')->orWhere('codigo','like','%'.$chave.'%');
            $lotes = Lote::select('id')->whereIn('mp_id', $mps)->orderBy('id');
            $loteFisicos = LoteFisico::where(function (Builder $query) {
                $query->where('situacao','Aguardando Análise')->orWhere('situacao','Aguardando Conferência');
            })->whereIn('lote_id', $lotes)->whereNull('chegada')->paginate(15);
        } else {
            $loteFisicos = LoteFisico::where('situacao','Aguardando Conferência')->whereNull('chegada')->orderBy('lote_id', 'asc')->paginate(15);
        }
        return view('loteFisicos.loteFisicos', compact('loteFisicos'));
    }

    public function mp_index(string $chave = null)
    {
        if ($chave) {
            $mps = Mp::where('nome','like','%'.$chave.'%')->orWhere('nome_fc','like','%'.$chave.'%')->orWhere('nome_popular','like','%'.$chave.'%')->orWhere('cas','like','%'.$chave.'%')->orWhere('codigo','like','%'.$chave.'%')->paginate(20);
        } else {
            $mps = Mp::paginate(20);
        }
        return view('loteFisicos.mp_index', compact('mps'));
    }

    public function create(Mp $mp)
    {
        return view('loteFisicos.create', compact('mp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, LoteFisico $loteFisico = null)
    {
        $usuario = Auth::user();
        if ($request->isMethod('put')){
            $loteFisico = $loteFisico->where('id',$loteFisico->id)->update($request->except('_token', '_method', 'bt_salvar'));
        }
        if ($request->isMethod('post')){
            $lote = Lote::create($request->except('_token', '_method', 'bt_salvar'));
            $loteFisico = LoteFisico::create([
                'lote_id' => $lote->id,
                'situacao' => 'Aguardando Conferência',
                'entrada' => now(),
                'chegada' => now(),
                'recebidoPor_id' => $usuario->id,
            ]);
        }
        return route('loteFisicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(loteFisico $loteFisico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoteFisico $loteFisico = null)
    {
        return view('loteFisicos.edit', compact('loteFisico'));
    }

    /**
     * Update the specified resource in storage.
     */
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
