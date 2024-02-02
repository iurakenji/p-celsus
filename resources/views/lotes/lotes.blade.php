@extends('layouts.app')


@section('titulo')
Lotes
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>{{ $mp->nome }} - Lotes</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Situação</th>
                    <th>Fornecedor</th>
                    <th>Data de Entrada</th>
                    <th>Lote</th>
                    <th>NF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lotes as $lote)
                @php
                switch ($lote->situacao) {
                    case 'Liberado':
                        $cor = 'DarkGreen';
                        break;

                    case 'Aguardando Conferência':
                        $cor = 'DarkGoldenRod';
                        break;

                    case 'Em Espera':
                        $cor = 'DarkRed';
                        break;
                    default:
                        $cor = 'Black';
                        break;
                }
                @endphp
                <tr>
                    <td style="width: 20%"><span style="color: {{ $cor }}">{{ $lote->situacao }}</span></td>
                    <td style="width: 30%">{{ $lote->fornecedor->nome }}</td>
                    <td style="width: 15%">{{ $lote->entrada }}</td>
                    <td style="width: 25%">{{ $lote->lote }}</td>
                    <td style="width: 15%">{{ $lote->nf }}</td>
                    <td style="width: 15%"><a href=" {{ route('lotes.show', ['mp' => $mp->id ,'lote' => $lote->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $lotes->links('includes.pagination') }}

    </div>
    <br><br>
    <div class="row">
    <a href="{{ route('lotes.create', ['mp' => $mp->id]) }}">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Novo Lote
                </div>
            </div>
    </a>
    <div class="col s12 offset-m1 m3 left">
        <a href="{{ url()->previous() }}">
            <div class="waves-effect waves-light btn blue-grey darken-4
            hoverable center-align white-text valign-wrapper container">
                <i class="material-icons">arrow_back</i>
                Voltar
            </div>
        </a>
    </div>
</div>
@endsection
