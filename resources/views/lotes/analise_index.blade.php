@extends('layouts.app')

@section('titulo')
{{ $mp->nome }} - Análises
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>{{ $mp->nome }} - Análises</h5>
    </div>


    <div class="row justify-content-center">
        <x-mps.analises :mp="$mp->id" />
        <x-mps.observacoes :mp="$mp->id" />
        <x-mps.riscos :mp="$mp->id" />
        <x-mps.setores :mp="$mp->id" />
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
                    <td style="width: 30%">{{ $analise->nome }}</td>
                    <td style="width: 5%"><a href=" {{ route('mps.analise_delete', ['mp' => $mp->id, 'id' => $analise->id]) }} " class="list"> Excluir </a></td>
                    <td style="width: 5%"><a href=" {{ route('mps.analise_edit', ['mp' => $mp->id, 'id' => $analise->id, 'analise' => $analise->id]) }} " class="list"> Editar </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">



    </div>
        <div class="row">
            <a href="{{ route('mps.analise_show',  ['mp' => $mp->id] ) }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Adicionar
                </div>
            </div>
        </a>
        </div>
@endsection
