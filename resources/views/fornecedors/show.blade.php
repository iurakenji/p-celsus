@extends('layouts.app')


@section('titulo')
Fornecedores - {{ $fornecedor->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $fornecedor->nome }}</h4><hr></div>

    <form action=" {{ route('fornecedors.update', ['fornecedor' => $fornecedor->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="m-3">
            <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $fornecedor->nome }}">
            </div>
            <div class="m-3">
                <label class="form-label" for='telefone'>Telefone: </label>
                <input class="form-control" placeholder="Telefone"  type="text" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}">
            </div>
            <div class="m-3">
                <label class="form-label" for='cep'>CEP: </label>
                <input class="form-control" placeholder="CEP"  type="text" id="cep" name="cep" value="{{ $fornecedor->cep }}">
            </div>
            <div class="m-3">
                <label class="form-label" for='nome'>CNPJ: </label>
                <input class="form-control" placeholder="CNPJ"  type="text" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}">
            </div>
        </div>
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
    <form action=" {{ route('fornecedors.destroy', ['fornecedor' => $fornecedor->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>


@endsection
