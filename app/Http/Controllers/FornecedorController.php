<?php

namespace App\Http\Controllers;

use App\Models\fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedors = Fornecedor::paginate(15);

        return view('fornecedors.fornecedors', compact('fornecedors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fornecedor = new Fornecedor;

       $fornecedor->nome = $request->nome;
       $fornecedor->cep = $request->cep;
       $fornecedor->telefone = $request->telefone;
       $fornecedor->cnpj = $request->cnpj;

       $fornecedor->save();

       return redirect('/fornecedors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedors.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fornecedor = Fornecedor::find($id);

       $fornecedor->nome = $request->nome;
       $fornecedor->cep = $request->cep;
       $fornecedor->telefone = $request->telefone;
       $fornecedor->cnpj = $request->cnpj;

       $fornecedor->save();

       return redirect('/fornecedors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fornecedor::destroy($id);
        return redirect('/fornecedors');
    }
}
