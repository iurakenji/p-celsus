<?php

namespace App\Http\Controllers;

use App\Models\grupoDescarte;
use Illuminate\Http\Request;

class GrupoDescarteController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupodescartes = GrupoDescarte::paginate(15);

        return view('grupodescartes.grupodescartes', compact('grupodescartes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupodescartes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grupodescarte = new GrupoDescarte;

       $grupodescarte->nome = $request->nome;
       $grupodescarte->descricao = $request->descricao;

       $grupodescarte->save();

       return redirect('/grupodescartes');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoDescarte $grupodescarte)
    {
        return view('grupodescartes.show', compact('grupodescarte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoDescarte $grupodescarte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $grupodescarte = GrupoDescarte::find($id);

       $grupodescarte->nome = $request->nome;
       $grupodescarte->descricao = $request->descricao;

       $grupodescarte->save();

       return redirect('/grupodescartes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GrupoDescarte::destroy($id);
        return redirect('/grupodescartes');
    }
}
