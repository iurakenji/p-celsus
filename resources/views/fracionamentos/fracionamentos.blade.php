@extends('layouts.app')

@section('titulo')
Fracionamentos
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Fracionamentos</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fracionamentos as $fracionamento)
                <tr>
                    <td style="width: 35%">{{ $fracionamento->nome }}</td>
                    <td style="width: 55%">{{ $fracionamento->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('fracionamentos.show', ['fracionamento' => $fracionamento->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $fracionamentos->links('includes.pagination') }}

    </div>

    <a href="{{ route('fracionamentos.create') }}">
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
