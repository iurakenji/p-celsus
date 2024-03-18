@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

@endphp

@section('titulo')
Entrada de Lote Físico
@endsection

@section('conteudo')
<br>
<div class="row text-center">
    <div class="col">
        <h4>Entrada de Lote Físico: {{$mp->codigo.' - '.$mp->nome}}</h4>
    </div>
</div><hr>

    <form action=" {{ route('loteFisicos.store')}} " method="post">
        @csrf

        <div class="row mx-1 w-auto">
            <div class="col-4">
                <label class="form-label" for='fornecedor'>Fornecedor: </label>
                <select class="form-select" id="fornecedor_id" name="fornecedor_id">
                    @foreach ($fornecedors as $fornecedor)
                        <option value="{{ $fornecedor['id'] }}">{{ $fornecedor['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label class="form-label" for='lote'>Lote: </label>
                <input class="form-control" placeholder="Lote"  type="text" id="lote" name="lote">
            </div>
            <div class="col-2">
                <label class="form-label" for='nf'>Nota Fiscal: </label>
                <input class="form-control" placeholder="NF"  type="text" id="nf" name="nf">
            </div>
            <div class="col-2">
                <label class="form-label" for='quantidade'>Quantidade: </label>
                <input class="form-control" placeholder="Quantidade" type="number" id="quantidade" name="quantidade" step="0.001">
            </div>
        </div>
        <div class="row mx-1 w-auto">
            <div class="col-3">
                <label class="form-label" for='fabricacao'>Data de Fabricação: </label>
                <input class="form-control" type="date" id="fabricacao" name="fabricacao">
            </div>
            <div class="col-3">
                <label class="form-label" for='validade'>Data de Validade: </label>
                <input class="form-control" type="date" id="validade" name="validade">
            </div>
            <div class="col-3">
                <label class="form-label" for='entrada'>Data de Entrada: </label>
                <input class="form-control" type="datetime-local" id="entrada" name="entrada" value="{{ now()->format('Y-m-d H:i:s') }}">
            </div>
            <div class="col-3">
                <label class="form-label" for='armazenamento_id'>Armazenamento: </label>
                <select class="form-select" id="armazenamento_id" name="armazenamento_id">
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}">{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
<br>

        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('loteFisicos.index') }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
    </form>
        </div>

@endsection
