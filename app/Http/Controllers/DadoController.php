<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadoController extends Controller
{

    public function dados()
    {
        $materias = DB::table('mp')
            ->select('codigo','nome')
            ->get();

        return view('dados', compact('materias'));
    }

}
