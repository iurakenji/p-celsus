@extends('layouts.app')

@section('titulo')
Matérias-Primas
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Matérias-Primas</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mps as $mp)
                <tr>
                    <td style="width: 35%">{{ $mp->nome }}</td>
                    <td style="width: 55%">{{ $mp->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.show', ['mp' => $mp->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $mps->links('includes.pagination') }}

    </div>

    <a href="{{ route('mps.create') }}">
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
