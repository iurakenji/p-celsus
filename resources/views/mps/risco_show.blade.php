@extends('layouts.app')

@section('titulo')
Riscos de Matérias-Primas
@endsection

@section('conteudo')


    <div class="row center" style="margin: 0px 50px">
        <h5>{{ $mp->nome }}</h5>
    </div>

    <div class="row">
        <div class="valign-wrapper center">
            <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('mps.show', ['mp' => $mp]) }}">
                <i class="small material-icons">description</i>
                <span>
                Informações Básicas
                </span>
        </a>

            <a class=" white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('fracionamentos.index') }}">
                <i class="small material-icons">view_list</i>
                <span>
                Análises
                </span>
            </a>
        <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('mps.setor_index', ['mp' => $mp]) }}">
                <i class="small material-icons">apps</i>
                <span>
                Setores
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
                    <th></th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riscos as $risco)
                <tr>
                    <td style="width: 20%">Imagem</td>
                    <td style="width: 20%">{{ $risco->nome }}</td>
                    <td style="width: 50%">{{ $risco->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.risco_create', ['mp' => $mp->id, 'id' => $risco->id]) }} " class="list"> Adicionar </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $riscos->links('includes.pagination') }}

    </div>
        <div class="row">
            <a href="{{ route('riscos.create') }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Novo Registro
                </div>
            </div>
        </a>
        </div>
@endsection
