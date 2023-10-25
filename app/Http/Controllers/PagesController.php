<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {

        $teste = "Esse é um texto";
        $usuario = "Kendji";
        $li_usuario = "#";

        return view('home',['teste'=> $teste,'usuario'=> $usuario,''=> $usuario,'li_usuario'=> $li_usuario]);
    }

}
