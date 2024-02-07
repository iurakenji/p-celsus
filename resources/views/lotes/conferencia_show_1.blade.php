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



<div class="row">
    <div class="col m12 center">
        <h5> 1. Informações Básicas do Insumo </h5>
    </div>
</div>
<div class="row">
    <div class="col m12 center">
        <h6><b><span class="grey-text text-darken-4">Insumo:</span></b> {{$mp->codigo.' - '.$mp->nome }}   <a href="#"> Alterar</a>  </h6>
   </div>
</div>
<div class="row center" style="margin: 0px 20px ">

    <form action=" {{ route('lotes.conferencia_show_2', ['mp' => $mp->id, 'lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$mp->id}}">

        <div class="row">
            <div class="input-field col s4">
                <input type="text" id="cas" name="cas" value="{{ $mp->cas }}">
                <label for='cas'>CAS: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dci" name="dci" value="{{ $mp->dci }}">
                <label for='dci'>DCI: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dcb" name="dcb" value="{{ $mp->dcb }}">
                <label for='dcb'>DCB: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <label for="mp_vegetal">
                <input type="checkbox" id="mp_vegetal" name="mp_vegetal" value="1" @checked(old('mp_vegetal', $mp->mp_vegetal)) />
                <span>Matéria-Prima Vegetal</span>
                </label>
            </div>
            <div class="input-field col s2">
                <input type="text" id="parte_usada" name="parte_usada" value="{{ $mp->parte_usada }}">
                <label for='parte_usada'>Parte Usada: </label>
            </div>
            <div class="input-field col s8">
                <input type="text" id="nome_popular" name="nome_popular" value="{{ $mp->nome_popular }}">
                <label for='nome_popular'>Outros Nomes (científico / popular / etc.): </label>
            </div>
        </div>
<br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('lotes.conferencia_index', ['mp' => $lote->mp->id]) }}">
        <div class="waves-effect waves-light btn blue-grey darken-4
        hoverable center-align white-text valign-wrapper container">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>
</div>
<div class="col s12 m2 right">
    <button class="waves-effect teal darken-4
    white-text btn waves-light hoverable btn container" type="submit" name="bt_salvar" value="Salvar">
    Próximo  <i class="material-icons">navigate_next</i>
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
