<?php

namespace App\Http\Controllers;

use App\Models\referencia;
use Illuminate\Http\Request;

class ReferenciaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referencias = Referencia::paginate(15);

        return view('referencias.referencias', compact('referencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('referencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $referencia = new Referencia;

       $referencia->nome = $request->nome;
       $referencia->descricao = $request->descricao;

       $referencia->save();

       return redirect('/referencias');
    }

    /**
     * Display the specified resource.
     */
    public function show(Referencia $referencia)
    {
        return view('referencias.show', compact('referencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referencia $referencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $referencia = Referencia::find($id);

       $referencia->nome = $request->nome;
       $referencia->descricao = $request->descricao;

       $referencia->save();

       return redirect('/referencias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Referencia::destroy($id);
        return redirect('/referencias');
    }
}
