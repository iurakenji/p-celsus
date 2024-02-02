<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Mp;
use Illuminate\Http\Request;

class LoteController extends Controller
{

    public function mp_index(Request $request)
    {
        if (is_null($request)) {
        $mps = Mp::paginate(15);
        } else {
        $mps = Mp::where('nome','like','%'.$request->chave.'%')->orWhere('nome_fc','like','%'.$request->chave.'%')->orWhere('nome_popular','like','%'.$request->chave.'%')->orWhere('cas','like','%'.$request->chave.'%')->orWhere('codigo','like','%'.$request->chave.'%')->paginate(10);
        }

        return view('lotes.mp_index', compact('mps'));
    }
     /**
     * Display a listing of the resource.
     */
    public function index(Mp $mp)
    {
        $lotes = Lote::where('mp_id', $mp->id)->paginate(15);

        return view('lotes.lotes', compact('lotes', 'mp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lotes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lote = new Lote;

       $lote->nome = $request->nome;
       $lote->descricao = $request->descricao;

       $lote->save();

       return redirect('/lotes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mp $mp, Lote $lote)
    {
        return view('lotes.show', compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $lote = Lote::find($id);

       $lote->nome = $request->nome;
       $lote->descricao = $request->descricao;

       $lote->save();

       return redirect('/lotes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lote::destroy($id);
        return redirect('/lotes');
    }
}
