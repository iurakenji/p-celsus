@extends('layouts.app')


@section('titulo')
Matérias-Primas - {{ $mp->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">

    <h5>{{ $mp->nome }}</h5><br>

    <form action=" {{ route('mps.update', ['mp' => $mp->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="input-field col s2">
                <input type="text" id="codigo" name="codigo" value="{{ $mp->codigo }}">
                <label for='codigo'>Código: </label>
            </div>
            <div class="input-field col s10">
            <label for='nome' title='Nome'>Nome: </label>
            <input type="text" id="nome" name="nome" value="{{ $mp->nome }}">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="nome_fc" name="nome_fc" value="{{ $mp->nome_fc }}">
                <label for='nome_fc'>Nome Alternativo / Fórmula Certa: </label>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select class="browser-default" id="tipo_acesso" name="tipo_acesso">
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Sólido' ? 'selected' : '' }}>'Sólido'</option>
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Líquido' ? 'selected' : '' }}>'Líquido'</option>
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Semi-Sólido' ? 'selected' : '' }}>'Semi-Sólido'</option>
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Semi-Acabado' ? 'selected' : '' }}>'Semi-Acabado'</option>
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Produto Final' ? 'selected' : '' }}>'Produto Final'</option>
                        <option value="{{ $mp->tipo }}" {{$mp->tipo == 'Outros' ? 'selected' : '' }}>'Outros'</option>
                </select>
                <label for='forma'>Forma: </label>
        </div>

</div>
<div class="col s12 m2 left">
    <a href="{{ route('mps.index') }}">
        <div class="waves-effect waves-light btn lime darken-4
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
<form action=" {{ route('mps.destroy', ['mp' => $mp->id]) }}" method="POST">
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
