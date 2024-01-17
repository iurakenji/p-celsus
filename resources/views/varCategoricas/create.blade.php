@extends('layouts.app')


@section('titulo')
Tipos de Insumo - Novo Registro
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>Novo Registro</h5><br>

    <form action=" {{ route('varCategoricas.store')}}" method="post">
        @csrf
        <input type="hidden" id="analise_id" name="analise_id" value=" {{ $analise->id }} ">
        <div class="row">
            <div class="input-field col s2">
                <input placeholder="Ordem"  type="text" id="ordem" name="ordem">
                <label for='nome'>Ordem: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome">
                <label for='nome'>Nome: </label>
            </div>
        </div><br><br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('varCategoricas.index', ['analise' => $analise->id]) }}">
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
@endsection
