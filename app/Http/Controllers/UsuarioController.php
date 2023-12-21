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
        $usuarios = Usuario::paginate(15);

        return view('usuarios.usuarios', compact('usuarios'));
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
    public function show(Usuario $usuario)
    {
        dd($usuario->slug);
        $usuario = Usuario::where('login', $usuario->slug)->first();

      // return view('usuarios.show', compact('usuario'));
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
        $dados['password'] = Hash::make($dados['password']);
        $usuario = Usuario::upsert(
            [
                'login' => $dados['login'],
                'nome' => $dados['nome'],
                'tipo_acesso_id' => 1,
                'conselho' => $dados['conselho'],
                'registro' => $dados['registro'],
                'titulo' => $dados['titulo'],
                'email' => $dados['email'],
                'password' => $dados['password'],
                'slug' => Str::slug($dados['nome']),
                'ativo' => 1
            ],
            [
                'id'
            ],
            [
                'login' => $dados['login'],
                'nome' => $dados['nome'],
                'tipo_acesso_id' => 1,
                'conselho' => $dados['conselho'],
                'registro' => $dados['registro'],
                'titulo' => $dados['titulo'],
                'email' => $dados['email'],
                'password' => $dados['password'],
                'slug' => Str::slug($dados['nome']),
                'ativo' => 1
            ]
        );
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
