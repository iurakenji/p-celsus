@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px ">
        <h5>{{ $usuario->nome }}</h5><br>
        <p> <strong>Login: </strong> {{ $usuario->login }} </p>
        <p> <strong>Tipo de Acesso: </strong> {{ $usuario->tipo_acesso_id }}</p>
        <p> <strong>Conselho: </strong>{{ $usuario->conselho }} </p>
        <p> <strong>Registro: </strong>{{ $usuario->registro }} </p>
        <p> <strong>Gênero:</strong> {{ $usuario->genero }} </p>
        <p> <strong>Título:</strong> {{ $usuario->titulo }} </p>
        <p> <strong>E-mail: </strong>{{ $usuario->email }} </p>
        <p> <strong>Senha:</strong> {{ $usuario->password }} </p>
        <p> <strong>Ativo:</strong> {{ $usuario->ativo }} </p>


    </div>

    <footer class="row center">
        <a href="{{ route('usuarios') }}">Voltar</a>
    </footer>
@endsection
