@extends('layouts.app')


@section('titulo')
Tipo de Acesso - {{ $tipo_acesso->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>{{ $tipo_acesso->nome }}</h5><br>

    <form action=" {{ route('tipo_acessos.update', ['tipo_acesso' => $tipo_acesso->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $tipo_acesso->nome }}">
                <label for='nome'>Nome: </label>
            </div>
            <div class="input-field col s8">
            <label for='descricao' title='Descrição'>Descrição: </label>
            <input type="text" id="descricao" name="descricao" value="{{ $tipo_acesso->descricao }}">
            </div>
        </div><br><br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('tipo_acessos.index') }}">
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
<form action=" {{ route('tipo_acessos.destroy', ['tipo_acesso' => $tipo_acesso->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="col s12 m2 right">
        <button class="waves-effect red lighten-1
        white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endsection