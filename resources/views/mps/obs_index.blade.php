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
        <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('mps.risco_index', ['mp' => $mp]) }}">
            <i class="small material-icons">error_outline</i>
            <span>
            Riscos
            </span>
    </a>
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
                    <td style="width: 55%">{{ $observacao->observacao }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.obs_delete', ['mp' => $mp->id, 'id' => $observacao->id]) }} " class="list"> Excluir </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">



    </div>
        <div class="row">
            <div class="col s12 m2 left">
                <a href="{{ route('mps.show', ['mp' => $mp->id]) }}">
                    <div class="waves-effect waves-light btn blue-grey darken-4
                    hoverable center-align white-text valign-wrapper container">
                        <i class="material-icons">arrow_back</i>
                        Voltar
                    </div>
                </a>
            </div>
            <a href="{{ route('mps.obs_show',  ['mp' => $mp->id] ) }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Adicionar
                </div>
            </div>
        </a>
        </div>
@endsection
