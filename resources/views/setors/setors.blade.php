@extends('layouts.app')

@section('titulo')
Setores
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Setores</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setors as $setor)
                <tr>
                    <td style="width: 35%">{{ $setor->nome }}</td>
                    <td style="width: 55%">{{ $setor->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('setors.show', ['setor' => $setor->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $setors->links('includes.pagination') }}

    </div>

    <a href="{{ route('setors.create') }}">
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
