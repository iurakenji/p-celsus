@extends('layouts.app')

@php
    use App\Models\Tipo;

    $tipos = Tipo::all();
@endphp
@section('titulo')
Análises - {{ $analise->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $analise->nome }}</h4><hr></div>

    @if ($analise->tipo == 'Categórica Ordinal')
        <div class="text-center">
            <a href="{{ route('varCategoricas.index', ['analise' => $analise->id]) }}">
                <div class="waves-effect waves-light btn blue-grey darken-4
                hoverable center-align white-text valign-wrapper">
                    <i class="material-icons">apps</i>
                    Categorias
                </div>
            </a>
        </div>
    @endif

    <form action=" {{ route('analises.update', ['analise' => $analise->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row mx-2 w-auto">
            <div class="col-8">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $analise->nome }}">
            </div>
            <div class="col-4">
            <label class="form-label" for='tipo'>Forma: </label>
            <select class="form-select" id="tipo" name="tipo">
                    <option value="Numérica Discreta" {{$analise->tipo == 'Numérica Discreta"' ? 'selected' : '' }}>Numérica Discreta</option>
                    <option value="Numérica Contínua" {{$analise->tipo == 'Numérica Contínua' ? 'selected' : '' }}>Numérica Contínua</option>
                    <option value="Categórica Nominal" {{$analise->tipo == 'Categórica Nominal' ? 'selected' : '' }}>Categórica Nominal</option>
                    <option value="Categórica Ordinal" {{$analise->tipo == 'Categórica Ordinal' ? 'selected' : '' }}>Categórica Ordinal</option>
            </select>
            </div>
        </div>
        <div class="row mx-2 w-auto">
            <div class="col-2">
            <label class="form-label" for='unidade'>Unidade: </label>
            <input class="form-control" placeholder="Unidade"  type="text" id="unidade" name="unidade" value="{{ $analise->unidade }}">
            </div>
            <div class="col-2">
            <label class="form-label" for='margem'>Margem Permitida: </label>
            <input class="form-control" placeholder="Margem Permitida"  type="text" id="margem" name="margem" value="{{ $analise->margem }}">
            </div>
            <div class="col-2">
            <label class="form-label" for='valor_ar'>Valor_AR: </label>
            <input class="form-control" placeholder="Valor AR"  type="number" id="valor_ar" name="valor_ar" value="{{ $analise->valor_ar }}">
            </div>
            <div class="col-6">
            <label class="form-label" for='tipo'>Tipo: </label>
            <select class="form-select" id="tipo_id" name="tipo_id">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo['id'] }}" {{$analise->tipo_mp->nome == $tipo['id'] ? 'selected' : '' }}>{{ $tipo['nome'] }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="row m-2 w-auto">
            <div class="col-12">
            <label class="form-label" for='observacao'>Observação: </label>
            <textarea class="form-control" placeholder="Observações" id="observacao" name="observacao">{{ $analise->observacao }}</textarea>
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
        <form action=" {{ route('analises.destroy', ['analise' => $analise->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
                <i class="material-icons">delete</i>  Apagar
            </button>
        </form>
    </div>
<br>
@endsection
