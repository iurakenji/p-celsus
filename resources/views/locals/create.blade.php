@extends('layouts.app')


@section('titulo')
Locais de Armazenamento - Novo Registro
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>Novo Registro</h4>
</div><hr>

    <form action=" {{ route('locals.store') }} " method="post">
        @csrf

            <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome">
            </div>
            <div class="m-3">
            <label class="form-label" for='descricao' title='Descrição'>Orientações: </label>
            <input class="form-control" type="text" id="descricao" name="descricao">
            </div>

</div>

<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ url()->previous() }}">
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


