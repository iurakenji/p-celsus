@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;
    use App\Models\Observacao;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

    switch ($lote->situacao) {
        case 'Liberado':
            $cor = 'LimeGreen';
            break;

        case 'Aguardando Conferência':
            $cor = 'GoldenRod';
            break;

        case 'Em Espera':
            $cor = 'Maroon';
            break;
        default:
            $cor = 'Black';
            break;
    }



@endphp

@section('titulo')
Informações de Lote - {{ $lote->mp->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center mb-4">
        <h4> {{$mp->codigo.' - '.$mp->nome }}   <a href="{{ route('lotes.conferencia_index', ['mp' => $lote->mp->id]) }}"> <small>Alterar</small></a>  </h4>
</div>
<hr>
<div class="text-start ms-4">
        <h5> 1. Informações Básicas do Insumo </h5><hr>
</div>

<div class="row">

    <form action=" {{ route('lotes.conferencia_show_2', ['mp' => $mp->id, 'lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$mp->id}}">

        <div class="row mx-1 w-auto">
            <div class="col-3">
                <label class="form-label" for='cas'>CAS: </label>
                <input class="form-control" type="text" id="cas" name="cas" value="{{ $mp->cas }}">
            </div>
            <div class="col-5">
                <label class="form-label" for='dci'>DCI: </label>
                <input class="form-control" type="text" id="dci" name="dci" value="{{ $mp->dci }}">
            </div>
            <div class="col-4">
                <label class="form-label" for='dcb'>DCB: </label>
                <input class="form-control" type="text" id="dcb" name="dcb" value="{{ $mp->dcb }}">
            </div>
        </div>
        <div class="row m-1 w-auto">
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="mp_vegetal" name="mp_vegetal" value="1" @checked(old('mp_vegetal', $mp->mp_vegetal)) />
                    <label class="form-check-label" for="ex">Matéria-Prima Vegetal</label>
                </div>
            </div>
            <div class="col-3">
                <label class="form-label" for='parte_usada'>Parte Usada: </label>
                <input class="form-control" type="text" id="parte_usada" name="parte_usada" value="{{ $mp->parte_usada }}">
            </div>
            <div class="col-7">
                <label class="form-label" for='nome_popular'>Outros Nomes (científico / popular / etc.): </label>
                <input class="form-control" type="text" id="nome_popular" name="nome_popular" value="{{ $mp->nome_popular }}">
            </div>
        </div>
</div>

<hr>
<div class="text-start ms-4">
        <h5> Observações</h5><hr>
</div>

<table class="table table-striped table-hover m-2 align-middle">
    <thead>
        <tr>
            <th style="width: 30%">Nome</th>
            <th style="width: 60%">Observação</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($obs as $ob)
        <tr>
            <td>{{ $ob->nome}}</td>
            <td>{{ $ob->observacao}}</td>
            <td><a href=" {{ route('lotes.conferencia_delObs', ['mp' => $mp->id, 'lote' => $lote->id, 'obs' => $ob->id]) }} " class="list"> Excluir </a></td>
        </tr>
        @endforeach
    </tbody>
</table>   
<div class="d-grid gap-2 d-md-flex justify-content-md-center mb-3">
    <button type="button" class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" data-bs-toggle="modal" data-bs-target="#modalObs">
        Adicionar Nova Observação
    </button>
</div>

<br>
<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ route('lotes.conferencia_index', ['mp' => $lote->mp->id]) }}">
        <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
        <i class="material-icons">arrow_back</i>
        Voltar
        </div>  
    </a>
    <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
        Próximo  <i class="material-icons">arrow_forward</i>
    </button>
</form>

<div class="modal fade modal-xl" id="modalObsMp" tabindex="-1" aria-labelledby="modalObs" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Observações de Matéria Prima</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <table class="table table-striped table-hover m-2 align-middle">
                    <thead>
                        <tr>
                            <th style="width: 20%">Nome</th>
                            <th style="width: 60%">Observação</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $obs = $obs->pluck('id')->toArray();
                            $observacaos = Observacao::where('tipo', 'Matéria-Prima')->whereNotIn('id',(array)$obs)->get();
                        @endphp
                        @foreach ($observacaos as $observacao)
                        <tr>
                            <td>{{ $observacao->nome }}</td>
                            <td>{{ $observacao->observacao }}</td>
                            <td><a href=" {{ route('lotes.conferencia_addObs', ['mp' => $mp->id, 'lote' => $lote->id, 'obs' => $observacao->id]) }} " class="list"> Adicionar </a></td>
                        </tr>
        
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
    </div>
</div>

@endsection
