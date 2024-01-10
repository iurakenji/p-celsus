<?php

namespace App\Http\Controllers;

use App\Models\observacao;
use Illuminate\Http\Request;

class ObservacaoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $observacaos = Observacao::paginate(15);

        return view('observacaos.observacaos', compact('observacaos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('observacaos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $observacao = new Observacao;

       $observacao->nome = $request->nome;
       $observacao->tipo = $request->tipo;
       $observacao->observacao = $request->descricao;

       $observacao->save();

       return redirect('/observacaos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Observacao $observacao)
    {
        return view('observacaos.show', compact('observacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observacao $observacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $observacao = Observacao::find($id);

       $observacao->nome = $request->nome;
       $observacao->tipo = $request->tipo;
       $observacao->observacao = $request->descricao;

       $observacao->save();

       return redirect('/observacaos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Observacao::destroy($id);
        return redirect('/observacaos');
    }
}
