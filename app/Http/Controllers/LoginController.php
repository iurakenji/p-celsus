<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validate([
            'login' => ['required'],
            'password'=> ['required'],
        ]);

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('home');
    } else {
        return redirect()->back()->with(['erro', 'Usuário ou senha inválidos.']);
    }
}
}