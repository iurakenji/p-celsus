<?php

namespace App\Http\Controllers;

use App\Models\loteFisico;
use App\Models\Mp;
use App\Models\Lote;
use Illuminate\Http\Request;

class LoteFisicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $lotes = LoteFisico::where('situacao','Aguardando Análise')->orWhere('situacao','Aguardando Conferência')->paginate(15);

            return view('loteFisicos.loteFisicos', compact('lotes'));

        
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
    public function show(loteFisico $loteFisico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loteFisico $loteFisico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, loteFisico $loteFisico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loteFisico $loteFisico)
    {
        //
    }
}
