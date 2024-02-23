@extends('layouts.app')

@section('titulo')
Análises
@endsection

@section('conteudo')


    <div class="row center" style="margin: 0px 50px">
        <h5>{{ $mp->nome }} - Adicionar Análise</h5>
    </div>

    <div class="row">
        <div class="valign-wrapper center">
    <x-mps.infos :mp="$mp->id" />
    <x-mps.riscos :mp="$mp->id" />
    <x-mps.setores :mp="$mp->id" />
    <x-mps.observacoes :mp="$mp->id" />
    </div>
    </div>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($analises as $analise)
                <tr>
                    <td style="width: 90%">{{ $analise->nome }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.analise_edit', ['mp' => $mp->id, 'id' => 'novo', 'analise' => $analise->id]) }} " class="list"> Adicionar </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $analises->links('includes.pagination') }}

    </div>
        <div class="row">
            <div class="col s12 m2 left">
                <a href="{{ route('mps.analise_index', ['mp' => $mp]) }}">
                    <div class="waves-effect waves-light btn blue-grey darken-4
                    hoverable center-align white-text valign-wrapper container">
                        <i class="material-icons">arrow_back</i>
                        Voltar
                    </div>
                </a>
            </div>
            <a href="{{ route('analises.create') }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Novo Registro
                </div>
            </div>
        </a>
        </div>
@endsection
