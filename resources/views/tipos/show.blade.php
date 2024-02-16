@extends('layouts.app')


@section('titulo')
Tipos de Insumos - {{ $tipo->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $tipo->nome }}</h4>
</div><hr>

    <form action="{{ route('tipos.update', ['tipo' => $tipo->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
             <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $tipo->nome }}">
            </div>
            <div class="m-3">
                <label class="form-label" for='descricao' title='Descrição'>Descrição: </label>
                <input class="form-control" type="text" id="descricao" name="descricao" value="{{ $tipo->descricao }}">
            </div>

<br>
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
    <form action=" {{ route('tipos.destroy', ['tipo' => $tipo->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endsection
