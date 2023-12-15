<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class PagesController extends Controller
{

    public function index() {

        return view('login.form');
    }

    public function home() {

        return view('home');
    }


    public function usuarios() {

        $usuarios = Usuario::paginate(15);

       return view('usuarios.usuarios', compact('usuarios'));

    }

    public function usuario($slug) {

        $usuario = Usuario::where('slug', $slug)->first();

       return view('usuarios.usuario', compact('usuario'));

    }

    public function mps() {

       return view('mps.mps');

    }

}
