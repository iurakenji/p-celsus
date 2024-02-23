<?php

namespace App\Http\Controllers;

use App\Models\VarCategorica;
use App\Models\Analise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VarCategoricaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Analise $analise)
    {
        $varCategoricas = DB::table('var_categoricas')->where('analise_id', $analise->id)->paginate(15);
        return view('varCategoricas.varCategoricas', compact('varCategoricas', 'analise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Analise $analise)
    {
        return view('varCategoricas.create', compact('analise'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Analise $analise)
    {
        $varCategorica = new VarCategorica;

        $varCategorica->analise_id = $analise->id;
       $varCategorica->nome = $request->nome;
       $varCategorica->ordem = $request->ordem;

       $varCategorica->save();

       return redirect()->route('varCategoricas.index', compact('analise'));
    }

    /**
     * Display the specified resource.
     */
    public function show(VarCategorica $varCategorica)
    {
        return view('varCategoricas.show', compact('varCategorica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VarCategorica $varCategorica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, varCategorica $varCategorica)
    {
       $varCategorica = VarCategorica::find($varCategorica->id);

       $varCategorica->analise_id = $request->analise_id;
       $varCategorica->nome = $request->nome;
       $varCategorica->ordem = $request->ordem;

       $varCategorica->save();

       return redirect()->route('varCategoricas.index', ['analise' => $varCategorica->analise_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(varCategorica $varCategorica)
    {
        //dd($varCategorica);
        DB::table('var_categoricas')->where('id','=',$varCategorica->id)->delete();

        return redirect()->route('varCategoricas.index', ['analise' => $varCategorica->analise_id]);
    }
}
