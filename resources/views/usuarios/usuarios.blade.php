@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Usuários</h5><br>
        <table>
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
                    <td>{{ $usuario->tipo_acesso_id }} </a></li>
                    <td><a href=" {{ route('usuario', $usuario->slug) }} " class="list"> Detalhes </a></li>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $usuarios->links('includes.pagination') }}

    </div>

@endsection
