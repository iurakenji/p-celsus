@extends('layouts.app')


@section('titulo')
Tipo de Acesso - {{ $tipo_acesso->nome }}
@endsection

@section('conteudo')

<div class="text-center align-items-center">
   <br> <h4>{{ $tipo_acesso->nome }}</h4><hr>
</div>
    <form action=" {{ route('tipo_acessos.update', ['tipo_acesso' => $tipo_acesso->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
            <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $tipo_acesso->nome }}">
            </div>
            <div class="m-3">
            <label class="form-label" for='descricao' title='Descrição'>Descrição: </label>
            <input class="form-control" type="text" id="descricao" name="descricao" value="{{ $tipo_acesso->descricao }}">
            </div>
<br><br>

    <div class="d-grid gap-5 d-md-flex justify-content-md-center">
        <a href="{{ url()->previous() }}">
            <div class="btn btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
            </div>
        </a>
        <button class="btn btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
        </button>
        </form>
        <form action=" {{ route('tipo_acessos.destroy', ['tipo_acesso' => $tipo_acesso->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>
        </form>
        </div>
@endsection
