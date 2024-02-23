@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

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
<div class="text-center">
        <h4> {{$mp->codigo.' - '.$mp->nome }}    </h4>
</div>
<hr>
    <div class="text-start ms-4">
        <h5> 2. Informações do Lote </h5><hr>
    </div>

<div class="row">
    <form action=" {{ route('lotes.conferencia_show_3', ['mp' => $mp->id, 'lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="mp_id" value="{{$mp->id}}">

        <div class="row mx-1 w-auto">
            <div class="col-4">
                <label class="form-label" for='fornecedor'>Fornecedor: </label>
                <select class="form-select" id="fornecedor_id" name="fornecedor_id" @disabled($lote->situacao == 'Liberado')>
                    @foreach ($fornecedors as $fornecedor)
                        <option value="{{ $fornecedor['id'] }}" {{$lote->fornecedor_id == $fornecedor['id'] ? 'selected' : '' }}>{{ $fornecedor['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label class="form-label" for='lote'>Lote: </label>
                <input class="form-control" placeholder="Lote"  type="text" id="lote" name="lote" value="{{ $lote->lote }}" @readonly($lote->situacao == 'Liberado')>
            </div>
            <div class="col-2">
                <label class="form-label" for='nf'>Nota Fiscal: </label>
                <input class="form-control" placeholder="NF"  type="text" id="nf" name="nf" value="{{ $lote->nf }}" @readonly($lote->situacao == 'Liberado')>
            </div>
            <div class="col-2">
                <label class="form-label" for='entrada'>Data de Entrada: </label>
                <input class="form-control" type="date" id="entrada" name="entrada" value="{{ $lote->entrada->format('Y-m-d') }}" @readonly($lote->situacao == 'Liberado')>
            </div>
        </div>
        <div class="row mx-1 w-auto">
            <div class="col-2">
                <label class="form-label" for='fabricacao'>Data de Fabricação: </label>
                <input class="form-control" type="date" id="fabricacao" name="fabricacao" value="{{ $lote->fabricacao->format('Y-m-d') }}" @readonly($lote->situacao == 'Liberado')>
            </div>
            <div class="col-2">
                <label class="form-label" for='validade'>Data de Validade: </label>
                <input class="form-control" type="date" id="validade" name="validade" value="{{ $lote->validade->format('Y-m-d') }}" @readonly($lote->situacao == 'Liberado')>
            </div>
            <div class="col-2">
                <label class="form-label" for='certificado'>Certificado: </label>
                <input class="form-control" type="text" id="certificado" name="certificado" value="{{ $lote->certificado }}" @readonly($lote->situacao == 'Liberado')>
            </div>
            <div class="col-4">
                <label class="form-label" for='origem'>Origem: </label>
                <select class="form-select" id="origem" name="origem" @disabled($lote->situacao == 'Liberado')>
                    @include('paises')
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for='quantidade'>Quantidade: </label>
                <input class="form-control" type="number" id="quantidade" name="quantidade" value="{{ $lote->quantidade }}" @readonly($lote->situacao == 'Liberado')>
            </div>
        </div>
        <div class="row mx-auto w-auto">
            <div class="col-4">
                <label class="form-label" for='armazenamento_id'>Condições de Armazenamento: </label>
                <select class="form-select" id="armazenamento_id" name="armazenamento_id" @disabled($lote->situacao == 'Liberado')>
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}" {{$lote->armazenamento_id == $armazenamento['id'] ? 'selected' : '' }}>{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for='amostra_cq'>Amostra CQ: </label>
                <input class="form-control" type="number" id="amostra_cq" name="amostra_cq" value="{{ $lote->amostra_cq }}" @readonly($lote->situacao == 'Liberado')>
            </div>
        </div>

        <br>
        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('lotes.conferencia_show_1', ['lote' => $lote->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
                Próximo  <i class="material-icons">navigate_next</i>
            </button>
        </form>

@endsection
