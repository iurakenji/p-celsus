<?php

namespace App\Http\Controllers;

use App\Models\tipo_acesso;
use Illuminate\Http\Request;

class TipoAcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_acessos = Tipo_Acesso::paginate(15);

        return view('tipo_acessos.tipo_acessos', compact('tipo_acessos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tipo_acesso $tipo_acesso)
    {
        return view('tipo_acessos.show', compact('tipo_acesso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_acesso $tipo_acesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipo_acesso $tipo_acesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipo_acesso $tipo_acesso)
    {
        //
    }
}
