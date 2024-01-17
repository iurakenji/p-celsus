@extends('layouts.app')


@section('titulo')
Análises - Novo Registro
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>Novo Registro</h5><br>

    <form action=" {{ route('analises.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome">
                <label for='nome'>Nome: </label>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Forma: </label>
                </div>
            <div class="input-field col s5">
                <select class="browser-default" id="tipo" name="tipo">
                        <option value="Numérica Discreta">Numérica Discreta</option>
                        <option value="Numérica Contínua">Numérica Contínua</option>
                        <option value="Categórica Nominal">Categórica Nominal</option>
                        <option value="Categórica Ordinal">Categórica Ordinal</option>
                </select>

            </div>


            <div class="col s2 m2">
                <a href="{{ route('varCategoricas.index', ['analise' => $ultimo]) }}">
                    <div class="waves-effect waves-light btn blue-grey darken-4
                    hoverable center-align white-text valign-wrapper">
                        <i class="material-icons">apps</i>
                        Categorias
                    </div>
                </a>
            </div>


        </div>
        <div class="row">
        <div class="input-field col s4">
            <input placeholder=""  type="text" id="unidade" name="unidade">
            <label for='unidade'>Unidade: </label>
        </div>
        <div class="input-field col s4">
            <input placeholder="0"  type="text" id="margem" name="margem">
            <label for='margem'>Margem Permitida: </label>
        </div>
        <div class="input-field col s4">
            <input placeholder="0"  type="text" id="valor_ar" name="valor_ar">
            <label for='valor_ar'>Valor AR: </label>
        </div>
        </div>
        <div class="row">
            <div class="row">
            <div class="input-field col s12">
                <textarea class="materialize-textarea" placeholder="Observações" id="observacao" name="orbservacao"></textarea>
                <label for='observacao'>Observação: </label>
            </div>
        </div>
        </div>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('analises.index') }}">
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
