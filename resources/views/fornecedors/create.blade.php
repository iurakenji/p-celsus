@extends('layouts.app')


@section('titulo')
Fornecedores - Novo Registro
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>Novo Registro</h5><br>

    <form action=" {{ route('fornecedors.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Nome"  type="text" id="nome" name="nome"">
                <label for='nome'>Nome: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Telefone"  type="text" id="telefone" name="telefone">
                <label for='telefone'>Telefone: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="CEP"  type="text" id="cep" name="cep">
                <label for='cep'>CEP: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="CNPJ"  type="text" id="cnpj" name="cnpj">
                <label for='nome'>CNPJ: </label>
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
@endsection
