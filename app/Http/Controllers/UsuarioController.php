<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function upsert(Request $request)
    {
        $dados = $request->all();
        $dados['password'] = Hash::make('123456');
        $usuario = Usuario::upsert(
            [
                'login' => $usuario['login'],
                'nome' => $usuario['nome'],
                'tipo_acesso_id' => 1,
                'conselho' => $usuario['conselho'],
                'registro' => $usuario['registro'],
                'titulo' => $usuario['titulo'],
                'email' => $usuario['email'],
                'password' => $usuario['password'],
                'slug' => Str::slug($usuario['nome']),
                'ativo' => 1
            ],
            [
                'id'
            ],
            [
                'login' => $usuario['login'],
                'nome' => $usuario['nome'],
                'tipo_acesso_id' => 1,
                'conselho' => $usuario['conselho'],
                'registro' => $usuario['registro'],
                'titulo' => $usuario['titulo'],
                'email' => $usuario['email'],
                'password' => $usuario['password'],
                'slug' => Str::slug($usuario['nome']),
                'ativo' => 1
            ]
        );
        return route('usuario', $usuario->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        //
    }
}
