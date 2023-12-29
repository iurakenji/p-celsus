@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Usuários</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Título</th>
                    <th>Tipo de Acesso</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->login }} </a></li>
                    <td>{{ $usuario->nome }} </a></li>
                    <td>{{ $usuario->titulo }} </a></li>
                    <td>{{ $usuario->tipo_acesso->nome }} </a></li>
                    <td><a href=" {{ route('usuarios.show', ['usuario' => $usuario->id]) }} " class="list"> Detalhes </a></li>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $usuarios->links('includes.pagination') }}

    </div>

    <a href="{{ route('usuarios.create') }}">
        <div class="row">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Novo Registro
                </div>
            </div>
        </div>
    </a>
    
@endsection
