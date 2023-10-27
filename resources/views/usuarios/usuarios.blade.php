@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Usuários</h5><br>
        <ul>
        @foreach ($usuarios as $usuario)

            <li><a href=" {{ route('usuarios_detalhes', $usuario->slug) }} " class="lista"> {{ $usuario->nome }} </a></li>

        @endforeach
        </ul>
    </div>

    <div class="row center">

{{ $usuarios->links('includes.pagination') }}

    </div>

@endsection
