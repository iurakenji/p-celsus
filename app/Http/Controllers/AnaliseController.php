<?php

namespace App\Http\Controllers;

use App\Models\Analise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnaliseController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(string $tipo_id = '0')
    {
        //O parâmetro tipo_id possibilita filtrar ou não as análises pelo tipo
        if ($tipo_id == 0) {
        $analises = analise::paginate(15);
        } else {
        $analises = analise::where('tipo_id','=',$tipo_id)->paginate(15);
        }

        return view('analises.analises', compact('analises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo = DB::table('analises')->orderByDesc('id')->first()->id;
        $ultimo += 1;
        return view('analises.create', compact('ultimo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $analise = new Analise;

       $analise->nome = $request->nome;
       $analise->tipo = $request->tipo;
       $analise->unidade = $request->unidade;
       $margem = $request->margem;
       $margem == null ? $analise->margem  = 0 : $analise->margem  = $request->margem;
       $valor_ar = $request->valor_ar;
       $valor_ar == null ? $analise->valor_ar  = 0 : $analise->valor_ar  = $request->valor_ar;
       $analise->observacao = $request->observacao;
       $analise->tipo_id = $request->tipo_id;

       $analise->save();

       return redirect('/analises');
    }

    /**
     * Display the specified resource.
     */
    public function show(Analise $analise)
    {
        return view('analises.show', compact('analise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analise $analise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $analise)
    {
       $analise = Analise::find($analise);

       $analise->nome = $request->nome;
       $analise->tipo = $request->tipo;
       $analise->unidade = $request->unidade;
       $analise->margem = $request->margem;
       $analise->valor_ar = $request->valor_ar;
       $analise->observacao = $request->observacao;
       //dd($analise);

       $analise->save();

       return redirect('/analises');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Analise::destroy($id);
        return redirect('/analises');
    }
}
