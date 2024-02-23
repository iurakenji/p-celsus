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
<div class="row text-center">
    <div class="col">
        <h4>{{$lote->mp->codigo.' - '.$lote->mp->nome }}</h4>
    </div>
    <div class="col">
        <h4>Situação: <span style="color: {{ $cor }}"> {{ $lote->situacao }}</span>{{ $lote->situacao == 'Liberado' ? (' em '.$lote->liberacao_gq->format('d/m/Y')) : '' }} </h4>
    </div>
</div><hr>

    <form action=" {{ route('lotes.update', ['lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="mp_id" value="{{$lote->mp_id}}">

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
                <label class="form-label" for='quantidade'>Quantidade: </label>
                <input class="form-control" type="number" id="quantidade" name="quantidade" value="{{ $lote->quantidade }}" @readonly($lote->situacao == 'Liberado') step="0.001">
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
                <label class="form-label" for='entrada'>Data de Entrada: </label>
                <input class="form-control" type="datetime-local" id="entrada" name="entrada" value="{{ $lote->entrada->format('Y-m-d H:i:s') }}" @readonly($lote->situacao == 'Liberado')>
            </div>
        </div>
        <div class="row mx-1 w-auto">
            <div class="input-field col s2">
                <label class="form-label" for='armazenamento_id'>Armazenamento: </label>
                <select class="form-select" id="armazenamento_id" name="armazenamento_id" @disabled($lote->situacao == 'Liberado')>
                    @foreach ($armazenamentos as $armazenamento)
                        <option value="{{ $armazenamento['id'] }}" {{$lote->armazenamento_id == $armazenamento['id'] ? 'selected' : '' }}>{{ $armazenamento['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for='umidade'>Umidade: </label>
                <input class="form-control" type="number" id="umidade" name="umidade" value="{{ $lote->umidade }}" @readonly($lote->situacao == 'Liberado')  step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='teor'>Teor: </label>
                <input class="form-control" type="number" id="teor" name="teor" value="{{ $lote->teor }}" @readonly($lote->situacao == 'Liberado')  step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='fc'>Fator de Correção: </label>
                <input class="form-control" type="number" id="fc" name="fc" value="{{ $lote->fc }}" @readonly($lote->situacao == 'Liberado')  step="0.01">
            </div>
            <div class="col-2">
                <label class="form-label" for='amostra_cq'>Amostra CQ: </label>
                <input class="form-control" type="number" id="amostra_cq" name="amostra_cq" value="{{ $lote->amostra_cq }}" @readonly($lote->situacao == 'Liberado')  step="0.01">
            </div>
        </div>
        <div class="row mx-1 w-auto">
            <div class="col-1 offset-md-9">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="urgente" name="urgente" value="1" @checked(old('urgente', $lote->urgente)) />
                    <B><label class="form-check-label text-danger" for="ex">URGENTE</label></B>
                </div>
            </div>
        </div>
<br>

        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('lotes.index', ['mp' => $lote->mp->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
        @if ($lote->situacao != 'Liberado')
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
        @endif
    </form>
        @if ($lote->situacao = 'Liberado')
            <form action=" {{ route('lotes.destroy', ['lote' => $lote->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
                <i class="material-icons">delete</i>  Apagar
                </button>
            </form>
        @endif
        </div>

@endsection
