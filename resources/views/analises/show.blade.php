@extends('layouts.app')


@section('titulo')
Análises - {{ $analise->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>{{ $analise->nome }}</h5><br>

    <form action=" {{ route('analises.update', ['analise' => $analise->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $analise->nome }}">
                <label for='nome'>Nome: </label>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Forma: </label>
                </div>
            <div class="input-field col s5">
                <select class="browser-default" id="tipo" name="tipo">
                        <option value="Numérica Discreta" {{$analise->tipo == 'Numérica Discreta"' ? 'selected' : '' }}>Numérica Discreta</option>
                        <option value="Numérica Contínua" {{$analise->tipo == 'Numérica Contínua' ? 'selected' : '' }}>Numérica Contínua</option>
                        <option value="Categórica Nominal" {{$analise->tipo == 'Categórica Nominal' ? 'selected' : '' }}>Categórica Nominal</option>
                        <option value="Categórica Ordinal" {{$analise->tipo == 'Categórica Ordinal' ? 'selected' : '' }}>Categórica Ordinal</option>
                </select>

            </div>

            @if ($analise->tipo == 'Categórica Ordinal')

            <div class="col s2 m2">
                <a href="{{ route('varCategoricas.index', ['analise' => $analise->id]) }}">
                    <div class="waves-effect waves-light btn blue-grey darken-4
                    hoverable center-align white-text valign-wrapper">
                        <i class="material-icons">apps</i>
                        Categorias
                    </div>
                </a>
            </div>

            @endif

        </div>
        <div class="row">
        <div class="input-field col s4">
            <input placeholder="Unidade"  type="text" id="unidade" name="unidade" value="{{ $analise->unidade }}">
            <label for='unidade'>Unidade: </label>
        </div>
        <div class="input-field col s4">
            <input placeholder="Margem Permitida"  type="text" id="margem" name="margem" value="{{ $analise->margem }}">
            <label for='margem'>Margem Permitida: </label>
        </div>
        <div class="input-field col s4">
            <input placeholder="Valor AR"  type="text" id="valor_ar" name="valor_ar" value="{{ $analise->valor_ar }}">
            <label for='valor_ar'>Valor_AR: </label>
        </div>
        </div>
        <div class="row">
            <div class="row">
            <div class="input-field col s12">
                <textarea class="materialize-textarea" placeholder="Observações" id="observacao" name="orbservacao" value="{{ $analise->observacao }}"></textarea>
                <label for='observacao'>Observação: </label>
            </div>
        </div>
        </div>
        <br><br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('analises.index') }}">
        <div class="waves-effect waves-light btn blue-grey darken-4
        hoverable center-align white-text valign-wrapper container">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>
</div>
<div class="col s12 m2 right">
    <button class="waves-effect teal darken-4
    white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Salvar">
        <i class="material-icons">save</i>  Salvar
    </button>
</div>
</form>
<form action=" {{ route('analises.destroy', ['analise' => $analise->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="col s12 m2 right">
        <button class="waves-effect red lighten-1
        white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endsection
