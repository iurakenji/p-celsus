@extends('layouts.app')

@section('titulo')
Lotes
@endsection

@section('conteudo')

<br>

<div class="text-center">
    <h4>Lotes Pendentes</h4><hr>
</div>
    <table class="table table-striped table-hover m-2 align-middle">
        <thead>
            <tr>
                <th style="width: 10%">Situação</th>
                <th style="width: 30%">Insumo</th>
                <th style="width: 15%">Fornecedor</th>
                <th style="width: 15%">Entrada</th>
                <th style="width: 15%">Tipo</th>
                <th style="width: 10%"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($lotes as $lote)
            @php
            switch ($lote->situacao) {
                case 'Aguardando Análise':
                    $cor = 'LimeGreen';
                    break;

                case 'Aguardando Conferência':
                    $cor = 'DarkGoldenRod';
                    break;

                case 'Em Espera':
                    $cor = 'Maroon';
                    break;
                default:
                    $cor = 'Black';
                    break;
            }
            @endphp
            <tr>
                <td style="width: 10%"><span style="color: {{ $cor }}">{{ $lote->situacao }}</span></td>
                <td style="width: 30%">{!! ($lote->urgente == 1 ? "<b class='text-danger'>URGENTE! - </b>" : '').$lote->lote->mp->codigo.' - '.$lote->lote->mp->nome !!}</td>
                <td style="width: 15%">{{ $lote->lote->fornecedor->nome }}</td>
                <td style="width: 15%">{{ $lote->entrada }}</td>
                <td style="width: 15%">{{ $lote->lote->mp->tipo->nome }}</td>
                <td class="text-center" style="width: 10%"><a href="" class="list"> Adicionar Recebimento </a></td>
            </tr>

    @endforeach
</tbody>
    </table>
</div>

    <div class="row center">

{{ $lotes->links('includes.pagination') }}
    </div>
@endsection
