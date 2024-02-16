@extends('layouts.app')


@section('titulo')
Grupos de Descarte - {{ $grupodescarte->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $grupodescarte->nome }}</h4>
</div><hr>

    <form action=" {{ route('grupodescartes.update', ['grupodescarte' => $grupodescarte->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
            <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $grupodescarte->nome }}">
            </div>
            <div class="m-3">
            <label class="form-label" for='descricao' title='Descrição'>Orientações: </label>
            <input class="form-control" type="text" id="descricao" name="descricao" value="{{ $grupodescarte->orientacoes }}">
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
    <form action=" {{ route('grupodescartes.destroy', ['grupodescarte' => $grupodescarte->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>

@endsection
