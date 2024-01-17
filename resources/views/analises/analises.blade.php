@extends('layouts.app')

@section('titulo')
Análises
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Análises</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Observação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($analises as $analise)
                <tr>
                    <td style="width: 35%">{{ $analise->nome }}</td>
                    <td style="width: 15%">{{ $analise->tipo }}</td>
                    <td style="width: 40%">{{ $analise->observacao }}</td>
                    <td style="width: 10%"><a href=" {{ route('analises.show', ['analise' => $analise->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $analises->links('includes.pagination') }}

    </div>

    <a href="{{ route('analises.create') }}">
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
