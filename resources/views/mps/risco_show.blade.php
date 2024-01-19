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
    <x-mps.infos :mp="$mp->id" />
    <x-mps.analises :mp="$mp->id" />
    <x-mps.observacoes :mp="$mp->id" />
    <x-mps.setores :mp="$mp->id" />
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
