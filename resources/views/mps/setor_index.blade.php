@extends('layouts.app')

@section('titulo')
Setores Que Utilizam
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


        <h5 class="center">Setores Que Utilizam</h5><br>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($setors as $setor)
                <tr>
                    <td style="width: 20%">{{ $setor->nome }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.setor_delete', ['mp' => $mp->id, 'id' => $setor->id]) }} " class="list"> Excluir </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">



    </div>
        <div class="row">
            <a href="{{ route('mps.setor_show',  ['mp' => $mp->id] ) }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Adicionar
                </div>
            </div>
        </a>
        </div>
@endsection
