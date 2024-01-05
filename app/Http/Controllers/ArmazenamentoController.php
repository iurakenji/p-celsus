<?php

namespace App\Http\Controllers;

use App\Models\armazenamento;
use Illuminate\Http\Request;

class ArmazenamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armazenamentos = Armazenamento::paginate(15);

        return view('armazenamentos.armazenamentos', compact('armazenamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('armazenamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $armazenamento = new Armazenamento;

       $armazenamento->nome = $request->nome;
       $armazenamento->descricao = $request->descricao;

       $armazenamento->save();

       return redirect('/armazenamentos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Armazenamento $armazenamento)
    {
        return view('armazenamentos.show', compact('armazenamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Armazenamento $armazenamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $armazenamento = Armazenamento::find($id);

       $armazenamento->nome = $request->nome;
       $armazenamento->descricao = $request->descricao;

       $armazenamento->save();

       return redirect('/armazenamentos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Armazenamento::destroy($id);
        return redirect('/armazenamentos');
    }
}
