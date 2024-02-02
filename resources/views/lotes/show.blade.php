@extends('layouts.app')

@php
    switch ($lote->situacao) {
        case 'Liberado':
            $cor = 'DarkGreen';
            break;

        case 'Aguardando Conferência':
            $cor = 'DarkGoldenRod';
            break;

        case 'Em Espera':
            $cor = 'DarkRed';
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

</div>
<div class="row">
    <div class="col m6 center">
        <h5>{{ $lote->mp->nome }}</h5><br>
    </div>
    <div class="col m6 center">
        <h5>Situação: <span style="color: {{ $cor }}"> {{ $lote->situacao }} </span> </h5><br>
    </div>
</div>
<div class="row center" style="margin: 0px 20px ">

    <form action=" {{ route('lotes.update', ['lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value=" $lote->nome ">
                <label for='nome'>Nome: </label>
            </div>
        </div><br><br>
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
