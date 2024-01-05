<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use Illuminate\Http\Request;

class MpController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mps = Mp::paginate(15);

        return view('mps.mps', compact('mps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mp = new Mp;

       $mp->nome = $request->nome;
       $mp->descricao = $request->descricao;

       $mp->save();

       return redirect('/mps');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mp $mp)
    {
        return view('mps.show', compact('mp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mp $mp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $mp = Mp::find($id);

       $mp->nome = $request->nome;
       $mp->descricao = $request->descricao;

       $mp->save();

       return redirect('/mps');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mp::destroy($id);
        return redirect('/mps');
    }
}
