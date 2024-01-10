<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;


class MpController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mps = Mp::paginate(10);
        return view('mps.mps', compact('mps'));
    }

    public function pesquisa(Request $request)
    {
        $mps = Mp::where('nome','like','%'.$request->chave.'%')->orWhere('nome_fc','like','%'.$request->chave.'%')->orWhere('nome_popular','like','%'.$request->chave.'%')->orWhere('cas','like','%'.$request->chave.'%')->orWhere('codigo','like','%'.$request->chave.'%')->paginate(10);
        return view('mps.mps', compact('mps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mp = new Mp;

        $mp->codigo = $request->codigo;
       $mp->nome = $request->nome;
       $mp->nome_fc = $request->nome_fc;
       $mp->forma = $request->forma;
       $mp->tipo_id = $request->tipo_id;
       $mp->cas = $request->cas;
       $mp->nome_popular = $request->nome_popular;
       $mp->parte_usada = $request->parte_usada;
       $mp->mp_vegetal = $request->mp_vegetal == null ? 0 : 1;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada == null ? 0 : 1;
       $mp->hormonio = $request->hormonio == null ? 0 : 1;
       $mp->citostatico = $request->citostatico == null ? 0 : 1;
       $mp->lacto = $request->lacto == null ? 0 : 1;
       $mp->tintura = $request->tintura == null ? 0 : 1;
       $mp->enzima = $request->enzima == null ? 0 : 1;
       $mp->producao = $request->producao == null ? 0 : 1;
       $mp->micronizado = $request->micronizado == null ? 0 : 1;
       $mp->p344 = $request->p344 == null ? 0 : 1;
       $mp->pf = $request->pf == null ? 0 : 1;
       $mp->pc = $request->pc == null ? 0 : 1;
       $mp->ex = $request->ex == null ? 0 : 1;
       $mp->grupodescarte_id = $request->grupodescarte_id;
       $mp->fornecedor_id = $request->fornecedor_id;

       $mp->save();

       return redirect('/mps');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mp $mp)
    {
        return view('mps.show', compact('mp'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mp $mp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //  dd($request);
       $mp = Mp::find($id);

       $mp->codigo = $request->codigo;
       $mp->nome = $request->nome;
       $mp->nome_fc = $request->nome_fc;
       $mp->forma = $request->forma;
       $mp->tipo_id = $request->tipo_id;
       $mp->cas = $request->cas;
       $mp->nome_popular = $request->nome_popular;
       $mp->parte_usada = $request->parte_usada;
       $mp->mp_vegetal = $request->mp_vegetal == null ? 0 : 1;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada == null ? 0 : 1;
       $mp->hormonio = $request->hormonio == null ? 0 : 1;
       $mp->citostatico = $request->citostatico == null ? 0 : 1;
       $mp->lacto = $request->lacto == null ? 0 : 1;
       $mp->tintura = $request->tintura == null ? 0 : 1;
       $mp->enzima = $request->enzima == null ? 0 : 1;
       $mp->producao = $request->producao == null ? 0 : 1;
       $mp->micronizado = $request->micronizado == null ? 0 : 1;
       $mp->p344 = $request->p344 == null ? 0 : 1;
       $mp->pf = $request->pf == null ? 0 : 1;
       $mp->pc = $request->pc == null ? 0 : 1;
       $mp->ex = $request->ex == null ? 0 : 1;
       $mp->grupodescarte_id = $request->grupodescarte_id;
       $mp->fornecedor_id = $request->fornecedor_id;

       $mp->save();

       return redirect('/mps');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mp::destroy($id);
        return redirect('/mps');
    }
}
