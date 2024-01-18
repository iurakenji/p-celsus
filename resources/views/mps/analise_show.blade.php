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
            <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('mps.show', ['mp' => $mp]) }}">
                <i class="small material-icons">description</i>
                <span>
                Informações Básicas
                </span>
        </a>

        <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('mps.setor_index', ['mp' => $mp]) }}">
            <i class="small material-icons">apps</i>
            <span>
            Setores
            </span>
    </a>
            <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('mps.risco_index', ['mp' => $mp]) }}">
                <i class="small material-icons">error_outline</i>
                <span>
                Riscos
                </span>
            </a>
        <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('mps.obs_index', ['mp' => $mp]) }}">
            <i class="small material-icons">speaker_notes</i>
            <span>
            Observações
            </span>
        </a>
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
                    <td style="width: 20%">{{ $analise->nome }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.analise_edit', ['mp' => $mp->id, 'id' => $analise->id]) }} " class="list"> Adicionar </a></td>
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
