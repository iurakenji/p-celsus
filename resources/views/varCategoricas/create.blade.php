@extends('layouts.app')


@section('titulo')
Categorias - Novo Registro
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>Categorias - Novo Registro</h4><hr></div>

    <form action=" {{ route('varCategoricas.store', ['analise' => $analise->id]) }} " method="post">
        @csrf

        <input type="hidden" id="analise_id" name="analise_id">
        <div class="m-3">
            <div class="input-field col s2">
                <label class="form-label" for='nome'>Ordem: </label>
                <input class="form-control" placeholder="Ordem"  type="text" id="ordem" name="ordem">
            </div>
            <div class="input-field col s4">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome">
            </div>
        </div><br><br>
</div>

<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ route('varCategoricas.index', ['analise' => $analise->id]) }}">
        <div class="btn shadow btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>

    <button class="btn shadow btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
        <i class="material-icons">save</i>  Salvar
    </button>
    </form>
    </div>

@endsection
