@extends('layouts.app')


@section('titulo')
Riscos - Novo Registro
@endsection

@section('conteudo')
<div class="row">

</div><br>
<div class="text-center align-items-center" style="margin: 0px 20px ">
    <h4>Novo Registro</h4><hr>
</div>

    <form action=" {{ route('riscos.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="m-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input class="form-control" name="imagem" type="file" id="imagem">
        </div>
        <div class="m-3">
            <div class="input-field col s4">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome">

            <label class="form-label" for='descricao' title='Descrição'>Descrição: </label>
            <input class="form-control" type="text" id="descricao" name="descricao">
            </div>
        </div><br><br>
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
    <br>
@endsection
