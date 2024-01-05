<?php

namespace App\Http\Controllers;

use App\Models\fracionamento;
use Illuminate\Http\Request;

class FracionamentoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fracionamentos = Fracionamento::paginate(15);

        return view('fracionamentos.fracionamentos', compact('fracionamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fracionamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fracionamento = new Fracionamento;

       $fracionamento->nome = $request->nome;
       $fracionamento->descricao = $request->descricao;

       $fracionamento->save();

       return redirect('/fracionamentos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fracionamento $fracionamento)
    {
        return view('fracionamentos.show', compact('fracionamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fracionamento $fracionamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fracionamento = Fracionamento::find($id);

       $fracionamento->nome = $request->nome;
       $fracionamento->descricao = $request->descricao;

       $fracionamento->save();

       return redirect('/fracionamentos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fracionamento::destroy($id);
        return redirect('/fracionamentos');
    }
}
