@extends('layouts.app')

@section('titulo')
Lotes
@endsection


@section('conteudo')

<div class="row mx-3  align-items-center w-auto">
    <div class="col-10">
        <form action=" {{ route('loteFisicos.query', ['origem' => '1']) }} " method="post" >
            @csrf
        <div class="input-field">
            <label class="col-form-label" for='codigo'>Pesquisar: </label>
            <input class="form-control" type="text" id="chave" name="chave">
        </div>
    </div>
    <div class="col text-center mt-4">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle 
    border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
        <i class="material-icons">search</i>  Pesquisar
    </button>
    </div>
</form>
</div>
<hr>

<div class="text-center">
    <h4>Lotes Pendentes</h4>
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
            @foreach ($loteFisicos as $loteFisico)
            @php
            switch ($loteFisico->situacao) {
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
                <td style="width: 10%"><span style="color: {{ $cor }}">{{ $loteFisico->situacao }}</span></td>
                <td style="width: 30%">{!! ($loteFisico->urgente == 1 ? "<b class='text-danger'>URGENTE! - </b>" : '').$loteFisico->lote->mp->codigo.' - '.$loteFisico->lote->mp->nome !!}</td>
                <td style="width: 15%">{{ $loteFisico->lote->fornecedor->nome }}</td>
                <td style="width: 15%">{{ $loteFisico->entrada }}</td>
                <td style="width: 15%">{{ $loteFisico->lote->mp->tipo->nome }}</td>
                <td class="text-center" style="width: 10%"><a href="{{ route('loteFisicos.edit', ['mp' => $loteFisico->lote->mp->id, 'loteFisico' => $loteFisico->lote_id]) }}" class="list"> Adicionar Recebimento </a></td>
            </tr>

    @endforeach
</tbody>
    </table>
</div>

    <div class="row center">

{{ $loteFisicos->links('includes.pagination') }}
    </div>

    <div class="col text-center mt-4">
        <a href="{{ route('loteFisicos.mp_index') }}">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/><path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/><path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/></svg>
        Nova Entrada
        </button>
    </a>
    </div><br>
@endsection
