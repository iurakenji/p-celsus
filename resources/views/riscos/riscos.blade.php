@extends('layouts.app')

@section('titulo')
Riscos
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Riscos</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riscos as $risco)
                <tr>
                    <td style="width: 35%">{{ $risco->nome }}</td>
                    <td style="width: 55%">{{ $risco->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('riscos.show', ['risco' => $risco->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $riscos->links('includes.pagination') }}

    </div>

    <a href="{{ route('riscos.create') }}">
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
