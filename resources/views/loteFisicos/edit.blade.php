@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

@endphp

@section('titulo')
Entrada de Lote Físico
@endsection

@section('conteudo')
<br>
<div class="row text-center">
    <div class="col">
        <h4>Entrada de Lote Físico</h4>
    </div>
</div><hr>

    <form action="  " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row mx-1 w-95">
            <div class="col-2">
                <label class="form-label" for='codigo'>Código: </label>
                <input class="form-control" type="text" id="codigo" name="codigo" value="{{ $loteFisico->lote->mp->nome }}">
            </div>
        </div>
       
<br>

        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('loteFisicos.index') }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
    </form>
        </div>

@endsection
