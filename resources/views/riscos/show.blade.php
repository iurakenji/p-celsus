@extends('layouts.app')


@section('titulo')
Riscos - {{ $risco->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $risco->nome }}</h4>
</div>
<div class="text-center">
    @if ($risco->imagem)
    <img class="img-fluid img-thumbnail" src=" {{ asset($risco->imagem) }} " alt=" {{ $risco->nome }} " style="width: 10% ">
    @endif
</div><hr>

    <form action=" {{ route('riscos.update', ['risco' => $risco->id]) }} " method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="m-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input class="form-control" name="imagem" type="file" id="imagem">
        </div>
        <div class="m-3">
            <div class="input-field col s4">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $risco->nome }}">

            <label class="form-label" for='descricao' title='Descrição'>Descrição: </label>
            <input class="form-control" type="text" id="descricao" name="descricao" value="{{ $risco->descricao }}">
            </div>
        </div><br><br>

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
        <form action=" {{ route('riscos.destroy', ['risco' => $risco->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
                <i class="material-icons">delete</i>  Apagar
            </button>
    
        </div>
        <br>
        </form>
@endsection
