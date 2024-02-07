@extends('layouts.app')

@section('titulo')
Lotes
@endsection

@section('conteudo')

<br>

<div class="row center" style="margin: 0px 20px">
    <h5>Lotes Pendentes</h5><br>
    <table class="highlight">
        <thead>
            <tr>
                <th>Situação</th>
                <th>Insumo</th>
                <th>Fornecedor</th>
                <th>Entrada</th>
                <th>Tipo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lotes as $lote)
            @php
            switch ($lote->situacao) {
                case 'Liberado':
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
                <td style="width: 30%">{{ $lote->mp->codigo.' - '.$lote->mp->nome }}</td>
                <td style="width: 15%">{{ $lote->fornecedor->nome }}</td>
                <td style="width: 15%">{{ $lote->entrada }}</td>
                <td style="width: 15%">{{ $lote->mp->tipo->nome }}</td>
                <td style="width: 10%"><a href=" {{ route('lotes.conferencia_show_1', ['lote' => $lote->id]) }} " class="list"> Conferir </a></td>
            </tr>

    @endforeach
</tbody>
    </table>
</div>

    <div class="row center">

{{ $lotes->links('includes.pagination') }}
    </div>
@endsection
