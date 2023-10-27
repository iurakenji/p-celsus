<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class PagesController extends Controller
{

    public function index() {

        return view('login.form');
    }

    public function usuarios() {

        $usuarios = Usuario::paginate(15);

       return view('usuarios.usuarios', compact('usuarios'));

    }

    public function usuarios_detalhes($slug) {

        $usuario = Usuario::where('slug', $slug)->first();

       return view('usuarios.detalhes', compact('usuario'));

    }

}
