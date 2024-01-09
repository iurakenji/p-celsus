<?php

namespace App\Http\Controllers;

use App\Models\Mp;
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
       $mp->mp_vegetal = $request->mp_vegetal;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada;
       $mp->hormonio = $request->hormonio;
       $mp->citostatico = $request->citostatico;
       $mp->lacto = $request->lacto;
       $mp->tintura = $request->tintura;
       $mp->enzima = $request->enzima;
       $mp->producao = $request->producao;
       $mp->micronizado = $request->micronizado;
       $mp->p344 = $request->p344;
       $mp->pf = $request->pf;
       $mp->pc = $request->pc;
       $mp->ex = $request->ex;
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
       $mp = Mp::find($id);

       $mp->codigo = $request->codigo;
       $mp->nome = $request->nome;
       $mp->nome_fc = $request->nome_fc;
       $mp->forma = $request->forma;
       $mp->tipo_id = $request->tipo_id;
       $mp->cas = $request->cas;
       $mp->nome_popular = $request->nome_popular;
       $mp->parte_usada = $request->parte_usada;
       $mp->mp_vegetal = $request->mp_vegetal;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada;
       $mp->hormonio = $request->hormonio;
       $mp->citostatico = $request->citostatico;
       $mp->lacto = $request->lacto;
       $mp->tintura = $request->tintura;
       $mp->enzima = $request->enzima;
       $mp->producao = $request->producao;
       $mp->micronizado = $request->micronizado;
       $mp->p344 = $request->p344;
       $mp->pf = $request->pf;
       $mp->pc = $request->pc;
       $mp->ex = $request->ex;
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
