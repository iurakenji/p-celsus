<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Tipo_acesso;

class PagesController extends Controller
{

    public function index() {

        return view('login.form');
    }

    public function home() {

        return view('home');
    }

}
