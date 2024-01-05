@extends('layouts.app')


@section('titulo')
Fornecedores - {{ $fornecedor->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>{{ $fornecedor->nome }}</h5><br>

    <form action=" {{ route('fornecedors.update', ['fornecedor' => $fornecedor->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $fornecedor->nome }}">
                <label for='nome'>Nome: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Telefone"  type="text" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}">
                <label for='telefone'>Telefone: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="CEP"  type="text" id="cep" name="cep" value="{{ $fornecedor->cep }}">
                <label for='cep'>CEP: </label>
            </div>
            <div class="input-field col s4">
                <input placeholder="CNPJ"  type="text" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}">
                <label for='nome'>CNPJ: </label>
            </div>
        </div><br><br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('fornecedors.index') }}">
        <div class="waves-effect waves-light btn lime darken-4
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
<form action=" {{ route('fornecedors.destroy', ['fornecedor' => $fornecedor->id]) }}" method="POST">
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
