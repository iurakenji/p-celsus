<?php

namespace App\Http\Controllers;

use App\Models\risco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riscos = Risco::paginate(15);

        return view('riscos.riscos', compact('riscos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riscos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $risco = new Risco;

       $risco->nome = $request->nome;
       $risco->descricao = $request->descricao;
       $risco->imagem = $request->imagem;
       $risco->save();

       return redirect('/riscos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Risco $risco)
    {
        return view('riscos.show', compact('risco'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Risco $risco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $risco = Risco::find($id);

       $risco->nome = $request->nome;
       $risco->descricao = $request->descricao;
       if($request->imagem) {
        //dd($request->imagem);
       $risco->imagem = $request->imagem->store('img\riscos');
       //$risco->imagem = $request->imagem;
       }

       $risco->save();

       return redirect('/riscos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Risco::destroy($id);
        return redirect('/riscos');
    }
}
