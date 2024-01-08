<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::paginate(15);

        return view('tipos.tipos', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipo;

       $tipo->nome = $request->nome;
       $tipo->descricao = $request->descricao;

       $tipo->save();

       return redirect('/tipos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $tipo = Tipo::find($id);

       $tipo->nome = $request->nome;
       $tipo->descricao = $request->descricao;

       $tipo->save();

       return redirect('/tipos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tipo::destroy($id);
        return redirect('/tipos');
    }
}
