@extends('layouts.app')


@section('titulo')
Observações de Matérias-Primas - Novo Registro
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>Novo Registro</h4><hr></div>

    <form action=" {{ route('observacaos.store') }} " method="post">
        @csrf

            <div class="row m-2 w-auto">
            <div class="col-9 m3">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome">
            </div>
            <div class="col-3">
            <label class="form-label" for='tipo'>Tipo: </label>
                <select class="form-select" id="tipo" name="tipo">
                        <option value="Matéria-Prima">Matéria-Prima</option>
                        <option value="Método Analítico">Método Analítico</option>
                        <option value="Análise de Lote">Análise de Lote</option>
                        <option value="Lote">Lote</option>
                        <option value="Movimentação">Movimentação</option>
                </select>
            </div>
            </div>
            <div class="row m-2 w-auto">
            <div class="col-12">
            <label class="form-label" for='descricao' title='Descrição'>Texto: </label>
            <textarea class="form-control" id="descricao" rows="5" name="descricao" ></textarea>
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
        </div>

@endsection

