@extends('layouts.app')

@section('titulo')
Observações
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>{{ $mp->nome }}</h5>
    </div>


    <div class="row">
        <div class="valign-wrapper center">
    <x-mps.infos :mp="$mp->id" />
    <x-mps.analises :mp="$mp->id" />
    <x-mps.riscos :mp="$mp->id" />
    <x-mps.setores :mp="$mp->id" />
    </div>
    </div>


        <h5 class="center">Observações</h5><br>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Observação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($observacaos as $observacao)
                <tr>
                    <td style="width: 35%">{{ $observacao->nome }}</td>
                    <td style="width: 50%">{{ $observacao->observacao }}</td>
                    <td class="center-align" style="width: 15%"><a href=" {{ route('mps.analiseobs_add', ['mp' => $mp->id, 'observacao' => $observacao->id, 'analise' => $analise]) }} " class="list"> Adicionar </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">



    </div>
        <div class="row">
            <div class="col s12 m2 left">
                <a href="{{ route('mps.analise_edit', ['mp' => $mp->id, 'id' => $analise, 'analise' => $analise]) }}">
                    <div class="waves-effect waves-light btn blue-grey darken-4
                    hoverable center-align white-text valign-wrapper container">
                        <i class="material-icons">arrow_back</i>
                        Voltar
                    </div>
                </a>
            </div>
            <a href="{{ route('observacaos.create' ) }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Adicionar
                </div>
            </div>
        </a>
        </div>
@endsection
