@extends('layouts.app')


@section('titulo')
Categorias - {{ $varCategorica->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>Categorias - {{ $varCategorica->nome }}</h5><br>

    <form action=" {{ route('varCategoricas.update', ['varCategorica' => $varCategorica->id, 'analise' => $varCategorica->analise_id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" id="analise_id" name="analise_id" value=" {{ $varCategorica->analise_id }} ">
        <div class="row">
            <div class="input-field col s2">
                <input placeholder="Ordem"  type="text" id="ordem" name="ordem" value="{{ $varCategorica->ordem }}">
                <label for='nome'>Ordem: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $varCategorica->nome }}">
                <label for='nome'>Nome: </label>
            </div>
        </div><br><br>
</div>

<div class="col s12 m2 left">
    <a href="{{ route('varCategoricas.index', ['analise' => $varCategorica->analise_id]) }}">
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
<form action=" {{ route('varCategoricas.destroy', ['varCategorica' => $varCategorica->id]) }}" method="POST">
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
