@extends('layouts.app')

@section('titulo')
Tipos de Armazenamento
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Tipos de Armazenamento</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($armazenamentos as $armazenamento)
                <tr>
                    <td style="width: 35%">{{ $armazenamento->nome }}</td>
                    <td style="width: 55%">{{ $armazenamento->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('armazenamentos.show', ['armazenamento' => $armazenamento->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $armazenamentos->links('includes.pagination') }}

    </div>

    <a href="{{ route('armazenamentos.create') }}">
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
