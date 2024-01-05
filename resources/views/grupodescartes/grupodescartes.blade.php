@extends('layouts.app')

@section('titulo')
Grupos de Descarte
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Grupos de Descarte</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupodescartes as $grupodescarte)
                <tr>
                    <td style="width: 35%">{{ $grupodescarte->nome }}</td>
                    <td style="width: 55%">{{ $grupodescarte->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('grupodescartes.show', ['grupodescarte' => $grupodescarte->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $grupodescartes->links('includes.pagination') }}

    </div>

    <a href="{{ route('grupodescartes.create') }}">
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
