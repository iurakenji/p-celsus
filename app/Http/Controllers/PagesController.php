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


    public function mps() {

       return view('mps.mps');

    }

}
