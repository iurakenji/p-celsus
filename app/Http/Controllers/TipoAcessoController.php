<?php

namespace App\Http\Controllers;

use App\Models\tipo_acesso;
use Illuminate\Http\Request;

class TipoAcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_acessos = Tipo_Acesso::paginate(15);

        return view('tipo_acessos.tipo_acessos', compact('tipo_acessos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_acessos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo_acesso = new Tipo_Acesso;

       $tipo_acesso->nome = $request->nome;
       $tipo_acesso->descricao = $request->descricao;

       $tipo_acesso->save();

       return redirect('/tipo_acessos');
    }

    /**
     * Display the specified resource.
     */
    public function show(tipo_acesso $tipo_acesso)
    {
        return view('tipo_acessos.show', compact('tipo_acesso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_acesso $tipo_acesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipo_acesso = Tipo_Acesso::find($id);

       $tipo_acesso->nome = $request->nome;
       $tipo_acesso->descricao = $request->descricao;

       $tipo_acesso->save();

       return redirect('/tipo_acessos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tipo_Acesso::destroy($id);
    }
}
