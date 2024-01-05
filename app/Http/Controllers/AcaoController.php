<?php

namespace App\Http\Controllers;

use App\Models\acao;
use Illuminate\Http\Request;

class AcaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaos = Acao::paginate(15);

        return view('acaos.acaos', compact('acaos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acaos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acao = new Acao;

       $acao->nome = $request->nome;
       $acao->descricao = $request->descricao;

       $acao->save();

       return redirect('/acaos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acao $acao)
    {
        return view('acaos.show', compact('acao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acao $acao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $acao = Acao::find($id);

       $acao->nome = $request->nome;
       $acao->descricao = $request->descricao;

       $acao->save();

       return redirect('/acaos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Acao::destroy($id);
        return redirect('/acaos');
    }
}
