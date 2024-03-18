<?php

namespace App\Http\Controllers;

use App\Models\loteFisico;
use App\Models\Mp;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
            })->whereIn('lote_id', $lotes)->paginate(15);
        } else {
            $loteFisicos = LoteFisico::where('situacao','Aguardando Análise')->orderBy('lote_id', 'asc')->paginate(15);
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
        if ($request->isMethod('put')){
            $loteFisico = $loteFisico->where('id',$loteFisico->id)->update($request->except('_token', '_method', 'bt_salvar'));
            dd('não deu');
        }
        if ($request->isMethod('post')){
            $lote = Lote::insert($request->except('_token', '_method', 'bt_salvar'));
            dd($lote);
        }
        dd('não deu mesmo');
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
    public function edit(Mp $mp, LoteFisico $loteFisico = null)
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
