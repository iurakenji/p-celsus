@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

@endphp

@section('titulo')
Novo Lote
@endsection

@section('conteudo')
<br>
    <div class="text-center mb-3">
        <h4>Novo Lote: {{$mp->codigo.' - '.$mp->nome }}</h4>
    </div><hr>

    <form action=" {{ route('lotes.store', ['mp'=> $mp->id]) }} " method="post">
        @csrf
        <input type="hidden" name="mp_id" value="{{$mp->id}}">

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
        <div class="row">
            <div class="col-3">
                <label class="form-label" for='fabricacao'>Data de Fabricação: </label>
                <input class="form-control" type="date" id="fabricacao" name="fabricacao">
            </div>
            <div class="col-3">
                <label class="form-label" for='validade'>Data de Validade: </label>
                <input class="form-control" type="date" id="validade" name="validade">
            </div>
            <div class="col-3">
                <label class="form-label" for='certificado'>Certificado: </label>
                <input class="form-control" type="text" id="certificado" name="certificado">
            </div>
            <div class="col-3">
                <label class="form-label" for='origem'>Origem: </label>
                <select class="form-select" id="origem" name="origem">
                    @include('paises')
                </select>
            </div>
            <div class="col-3">
                <label class="form-label" for='entrada'>Data de Entrada: </label>
                <input class="form-control" type="datetime" id="entrada" name="entrada" value="{{ now()->format('Y-m-d H:i:s') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label class="form-label" for='armazenamento_id'>Armazenamento: </label>
                <select class="form-select" id="armazenamento_id" name="armazenamento_id">
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}">{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for='umidade'>Umidade: </label>
                <input class="form-control" type="number" id="umidade" name="umidade" step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='teor'>Teor: </label>
                <input class="form-control" type="number" id="teor" name="teor" step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='fc'>Fator de Correção: </label>
                <input class="form-control" type="number" id="fc" name="fc" step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='amostra_cq'>Amostra CQ: </label>
                <input class="form-control" type="number" id="amostra_cq" name="amostra_cq" step="0.01">
            </div>
        </div>
        <div class="row mx-1 w-auto">
            <div class="col-1 offset-md-9">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="urgente" name="urgente" value="1"/>
                    <B><label class="form-check-label text-danger" for="ex">URGENTE</label></B>
                </div>
            </div>
        </div>
<br>


        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('lotes.index', ['mp' => $mp->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
    </form>
        </div>
<br>
@endsection
