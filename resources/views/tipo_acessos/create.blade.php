@extends('layouts.app')


@section('titulo')
Tipo de Acesso - Novo Registro
@endsection

@section('conteudo')

<div class="text-center align-items-center" style="margin: 0px 20px ">
    <br><h4>Novo Registro</h4><br>
</div>
    <form action=" {{ route('tipo_acessos.store')}}" method="post">
        @csrf
            <div class="m-3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="m-3">
            <label class="form-label" for='descricao' title='Descrição'>Descrição: </label>
            <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição">
            </div>
            
<div class="d-grid gap-1 d-md-flex justify-content-md-center">
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
</div>
@endsection
