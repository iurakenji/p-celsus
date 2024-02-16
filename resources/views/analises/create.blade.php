@extends('layouts.app')

@php
    use App\Models\Tipo;

    $tipos = Tipo::all();
@endphp
@section('titulo')
Análises - Novo Registro
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>Novo Registro</h4><hr></div>


        <div class="text-center">
            <a href="{{ route('varCategoricas.index', ['analise' => $ultimo]) }}">
                <div class="waves-effect waves-light btn blue-grey darken-4
                hoverable center-align white-text valign-wrapper">
                    <i class="material-icons">apps</i>
                    Categorias
                </div>
            </a>
        </div>

    <form action=" {{ route('analises.store') }} " method="post">
        @csrf

        <div class="row mx-2 w-auto">
            <div class="col-8">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome"">
            </div>
            <div class="col-4">
            <label class="form-label" for='tipo'>Forma: </label>
            <select class="form-select" id="tipo" name="tipo">
                    <option value="Numérica Discreta">Numérica Discreta</option>
                    <option value="Numérica Contínua">Numérica Contínua</option>
                    <option value="Categórica Nominal">Categórica Nominal</option>
                    <option value="Categórica Ordinal">Categórica Ordinal</option>
            </select>
            </div>
        </div>
        <div class="row mx-2 w-auto">
            <div class="col-2">
            <label class="form-label" for='unidade'>Unidade: </label>
            <input class="form-control" placeholder="Unidade"  type="text" id="unidade" name="unidade">
            </div>
            <div class="col-2">
            <label class="form-label" for='margem'>Margem Permitida: </label>
            <input class="form-control" placeholder="Margem Permitida"  type="text" id="margem" name="margem">
            </div>
            <div class="col-2">
            <label class="form-label" for='valor_ar'>Valor_AR: </label>
            <input class="form-control" placeholder="Valor AR"  type="number" id="valor_ar" name="valor_ar">
            </div>
            <div class="col-6">
            <label class="form-label" for='tipo'>Tipo: </label>
            <select class="form-select" id="tipo_id" name="tipo_id">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo['id'] }}">{{ $tipo['nome'] }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="row m-2 w-auto">
            <div class="col-12">
            <label class="form-label" for='observacao'>Observação: </label>
            <textarea class="form-control" placeholder="Observações" id="observacao" name="observacao"></textarea>
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
<br>
@endsection

