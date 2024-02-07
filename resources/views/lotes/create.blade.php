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

<div class="row">
    <div class="col s12 center">
        <h5>Novo Lote: {{$mp->codigo.' - '.$mp->nome }}</h5>
    </div>
</div>
<div class="row center" style="margin: 0px 20px ">

    <form action=" {{ route('lotes.store', ['mp'=> $mp->id]) }} " method="post">
        @csrf
        <input type="hidden" name="mp_id" value="{{$mp->id}}">
        <div class="row">
            <div class="input-field col s1">
                <label for='fornecedor'>Fornecedor: </label>
            </div>
            <div class="input-field col s4">
                <select class="browser-default" id="fornecedor_id" name="fornecedor_id">
                    @foreach ($fornecedors as $fornecedor)
                        <option value="{{ $fornecedor['id'] }}">{{ $fornecedor['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s3">
                <input placeholder="Lote"  type="text" id="lote" name="lote">
                <label for='lote'>Lote: </label>
            </div>
            <div class="input-field col s2">
                <input placeholder="NF"  type="text" id="nf" name="nf">
                <label for='nf'>Nota Fiscal: </label>
            </div>
            <div class="input-field col s2">
                <input type="number" id="quantidade" name="quantidade" step="0.001">
                <label for='quantidade'>Quantidade: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input type="date" id="fabricacao" name="fabricacao">
                <label for='fabricacao'>Data de Fabricação: </label>
            </div>
            <div class="input-field col s2">
                <input type="date" id="validade" name="validade">
                <label for='validade'>Data de Validade: </label>
            </div>
            <div class="input-field col s2">
                <input type="text" id="certificado" name="certificado">
                <label for='certificado'>Certificado: </label>
            </div>
            <div class="input-field col s1">
                <label for='origem'>Origem: </label>
            </div>
            <div class="input-field col s3">
                <select class="browser-default" id="origem" name="origem">
                    @include('paises')
                </select>
            </div>
            <label for='entrada'>Data de Entrada: </label>
            <div class="input-field col s2">
                <input type="datetime" id="entrada" name="entrada" value="{{ now()->format('Y-m-d H:i:s') }}">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <label for='armazenamento_id'>Armazenamento: </label>
            </div>
            <div class="input-field col s3">
                <select class="browser-default" id="armazenamento_id" name="armazenamento_id">
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}">{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s1">
                <input type="number" id="umidade" name="umidade" step="0.01">
                <label for='umidade'>Umidade: </label>
            </div>
            <div class="input-field col s1">
                <input type="number" id="teor" name="teor" step="0.01">
                <label for='teor'>Teor: </label>
            </div>
            <div class="input-field col s2">
                <input type="number" id="fc" name="fc" step="0.01">
                <label for='fc'>Fator de Correção: </label>
            </div>
            <div class="input-field col s1">
            </div>
            <div class="input-field col s2">
                <input type="number" id="amostra_cq" name="amostra_cq" step="0.01">
                <label for='amostra_cq'>Amostra CQ: </label>
            </div>
        </div>
        <div class="row">

        </div>
<br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('lotes.index', ['mp' => $mp->id]) }}">
        <div class="waves-effect waves-light btn blue-grey darken-4
        hoverable center-align white-text valign-wrapper container">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>
</div>
<div class="col s12 m2 right">
    <button class="waves-effect teal darken-4
    white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Salvar">
        <i class="material-icons">save</i>  Salvar
    </button>
</div>
</form>
@if (2<1)
<form action=" {{ route('lotes.destroy', ['lote' => $lote->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="col s12 m2 right">
        <button class="waves-effect red lighten-1
        white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endif
@endsection
