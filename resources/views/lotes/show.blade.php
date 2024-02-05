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
    if ($lote->situacao == 'Liberado') {
        $soleitura = 'readonly';
    } else {
        $soleitura = '';
    }

    dd($soleitura);

@endphp

@section('titulo')
Informações de Lote - {{ $lote->mp->nome }}
@endsection

@section('conteudo')

<div class="row">
    <div class="col m6 center">
        <h5>{{$lote->mp->codigo.' - '.$lote->mp->nome }}</h5>
    </div>
    <div class="col m6 center">
        <h5>Situação: <span style="color: {{ $cor }}"> {{ $lote->situacao }}</span>{{ $lote->situacao == 'Liberado' ? (' em '.$lote->liberacao_gq->format('d/m/Y')) : '' }} </h5>
    </div>
</div>
<div class="row center" style="margin: 0px 20px ">

    <form action=" {{ route('lotes.update', ['lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="input-field col s1">
                <label for='fornecedor'>Fornecedor: </label>
            </div>
            <div class="input-field col s4">
                <select class="browser-default" id="fornecedor_id" name="fornecedor_id" $soleitura>
                    @foreach ($fornecedors as $fornecedor)
                        <option value="{{ $fornecedor['id'] }}" {{$lote->fornecedor_id == $fornecedor['id'] ? 'selected' : '' }}>{{ $fornecedor['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s3">
                <input placeholder="Lote"  type="text" id="lote" name="lote" value="{{ $lote->lote }}" $soleitura>
                <label for='lote'>Lote: </label>
            </div>
            <div class="input-field col s2">
                <input placeholder="NF"  type="text" id="nf" name="nf" value="{{ $lote->nf }}" $soleitura>
                <label for='nf'>Nota Fiscal: </label>
            </div>
            <div class="input-field col s2">
                <input type="number" id="quantidade" name="quantidade" value="{{ $lote->quantidade }}" $soleitura>
                <label for='quantidade'>Quantidade: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input type="date" id="fabricacao" name="fabricacao" value="{{ $lote->fabricacao->format('Y-m-d') }}" $soleitura>
                <label for='fabricacao'>Data de Fabricação: </label>
            </div>
            <div class="input-field col s2">
                <input type="date" id="validade" name="validade" value="{{ $lote->validade->format('Y-m-d') }}" $soleitura>
                <label for='validade'>Data de Validade: </label>
            </div>
            <div class="input-field col s2">
                <input type="text" id="certificado" name="certificado" value="{{ $lote->certificado }}" $soleitura>
                <label for='certificado'>Certificado: </label>
            </div>
            <div class="input-field col s1">
                <label for='origem'>Origem: </label $soleitura>
            </div>
            <div class="input-field col s3">
                <select class="browser-default" id="origem" name="origem" $soleitura>
                    @include('paises')
                </select>
            </div>
            <div class="input-field col s2">
                <input type="date" id="entrada" name="entrada" value="{{ $lote->entrada->format('Y-m-d') }}" $soleitura>
                <label for='entrada'>Data de Entrada: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <label for='armazenamento_id'>Armazenamento: </label>
            </div>
            <div class="input-field col s3">
                <select class="browser-default" id="armazenamento_id" name="armazenamento_id" $soleitura>
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}" {{$lote->armazenamento_id == $armazenamento['id'] ? 'selected' : '' }}>{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s1">
                <input type="number" id="umidade" name="umidade" value="{{ $lote->umidade }}" $soleitura>
                <label for='umidade'>Umidade: </label>
            </div>
            <div class="input-field col s1">
                <input type="number" id="teor" name="teor" value="{{ $lote->teor }}" $soleitura>
                <label for='teor'>Teor: </label>
            </div>
            <div class="input-field col s2">
                <input type="number" id="fc" name="fc" value="{{ $lote->fc }}" $soleitura>
                <label for='fc'>Fator de Correção: </label>
            </div>
            <div class="input-field col s1">
            </div>
            <div class="input-field col s2">
                <input type="number" id="amostra_cq" name="amostra_cq" value="{{ $lote->amostra_cq }}" $soleitura>
                <label for='amostra_cq'>Amostra CQ: </label>
            </div>
        </div>
        <div class="row">

        </div>
<br>
</div>
<div class="col s12 m2 left">
    <a href="{{ url()->previous() }}">
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
@endsection
