<?php

namespace App\Http\Controllers;

use App\Models\local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locals = Local::paginate(15);

        return view('locals.locals', compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $local = new Local;

       $local->nome = $request->nome;
       $local->descricao = $request->descricao;

       $local->save();

       return redirect('/locals');
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        return view('locals.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $local = Local::find($id);

       $local->nome = $request->nome;
       $local->descricao = $request->descricao;

       $local->save();

       return redirect('/locals');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Local::destroy($id);
        return redirect('/locals');
    }
}
