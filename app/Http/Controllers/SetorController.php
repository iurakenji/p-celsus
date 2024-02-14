<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setors = Setor::paginate(10);

        return view('setors.setors', compact('setors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setor = new Setor;

       $setor->nome = $request->nome;
       $setor->descricao = $request->descricao;

       $setor->save();

       return redirect('/setors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setor $setor)
    {
        return view('setors.show', compact('setor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(setor $setor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $setor = Setor::find($id);

       $setor->nome = $request->nome;
       $setor->descricao = $request->descricao;

       $setor->save();

       return redirect('/setors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Setor::destroy($id);
        return redirect('/setors');
    }
}
