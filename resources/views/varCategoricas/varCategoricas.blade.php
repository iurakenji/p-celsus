@extends('layouts.app')

@section('titulo')
Categorias - {{ $analise->nome }}
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Categorias - {{ $analise->nome }}</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Nome</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($varCategoricas as $varCategorica)
                <tr>
                    <td style="width: 15%">{{ $varCategorica->ordem }}</td>
                    <td style="width: 65%">{{ $varCategorica->nome }}</td>
                    <td style="width: 10%"><a href=" {{ route('varCategoricas.destroy', ['varCategorica' => $varCategorica->id]) }} " class="list"> Excluir </a></td>
                    <td style="width: 10%"><a href=" {{ route('varCategoricas.show', ['varCategorica' => $varCategorica->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $varCategoricas->links('includes.pagination') }}

    </div>
    <div class="col s12 m2 left">
        <a href="{{ route('analises.show', [$analise->id]) }}">
            <div class="waves-effect waves-light btn blue-grey darken-4
            hoverable center-align white-text valign-wrapper container">
                <i class="material-icons">arrow_back</i>
                Voltar
            </div>
        </a>
    </div>
    <a href="{{ route('varCategoricas.create', ['analise' => $analise->id]) }}">
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
