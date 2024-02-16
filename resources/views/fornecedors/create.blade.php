@extends('layouts.app')


@section('titulo')
Fornecedores - Novo Registro
@endsection

@section('conteudo')
<br>
<div class="text-center" style="margin: 0px 20px ">
    <h4>Novo Registro</h4><hr></div>

    <form action=" {{ route('fornecedors.store') }} " method="post">
        @csrf

        <div class="m-3">
            <div class="input-field col s12">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome">
            </div>
            <div class="input-field col s4">
                <label class="form-label" for='telefone'>Telefone: </label>
                <input class="form-control" placeholder="Telefone"  type="text" id="telefone" name="telefone">
            </div>
            <div class="input-field col s4">
                <label class="form-label" for='cep'>CEP: </label>
                <input class="form-control" placeholder="CEP"  type="text" id="cep" name="cep">
            </div>
            <div class="input-field col s4">
                <label class="form-label" for='nome'>CNPJ: </label>
                <input class="form-control" placeholder="CNPJ"  type="text" id="cnpj" name="cnpj">
            </div>
        </div>
        </div><br>
</div>

<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ url()->previous() }}">
        <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>

    <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
        <i class="material-icons">save</i>  Salvar
    </button>
    </form>

    </div>



@endsection




