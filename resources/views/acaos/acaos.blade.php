@extends('layouts.app')

@section('titulo')
Controle de Acesso - Ações
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Controle de Acesso - Ações</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acaos as $acao)
                <tr>
                    <td style="width: 35%">{{ $acao->nome }}</td>
                    <td style="width: 55%">{{ $acao->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('acaos.show', ['acao' => $acao->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $acaos->links('includes.pagination') }}

    </div>

    <a href="{{ route('acaos.create') }}">
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
