@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Tipos de Acesso</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_acessos as $tipo_acesso)
                <tr>
                    <td style="width: 35%">{{ $tipo_acesso->nome }}</td>
                    <td style="width: 55%">{{ $tipo_acesso->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('tipo_acessos.show', ['tipo_acesso' => $tipo_acesso->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $tipo_acessos->links('includes.pagination') }}

    </div>

    <a href="{{ route('tipo_acessos.create') }}">
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
