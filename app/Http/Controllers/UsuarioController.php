<?php

namespace App\Http\Controllers;

use App\Models\Tipo_acesso;
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
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;

        $usuario->login = $request->login;
        $usuario->nome = $request->nome;
        $usuario->tipo_acesso_id = $request->tipo_acesso;
        $usuario->conselho = $request->conselho;
        $usuario->registro = $request->registro;
        $usuario->genero = $request->genero;
        $usuario->titulo = $request->titulo;
        $usuario->email = $request->email;
        $usuario->ativo = $request->ativo;
        $usuario->slug = Str::slug($request->nome);
        $usuario->password = Hash::make($request->password);
        
       $usuario->save();

       return redirect('/usarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
       return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

       $usuario->login = $request->login;
       $usuario->nome = $request->nome;
       $usuario->tipo_acesso_id = $request->tipo_acesso;
       $usuario->conselho = $request->conselho;
       $usuario->registro = $request->registro;
       $usuario->genero = $request->genero;
       $usuario->titulo = $request->titulo;
       $usuario->email = $request->email;
       $usuario->ativo = $request->ativo;
       $usuario->slug = Str::slug($request->nome);

       $usuario->save();

       return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::destroy($id);
        return redirect('/usuarios');
    }
}
