@extends('layouts.app')


@section('titulo')
Riscos - {{ $risco->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>{{ $risco->nome }}</h5><br>

    <img src=" {{ asset('storage/img/riscos/Inflamavel.png') }} " alt="Inflamável" style="width: 10%">

    <form action=" {{ route('riscos.update', ['risco' => $risco->id]) }} " method="post">
        @csrf
        <div class="file-field input-field">
            <div class="btn">
              <span>Imagem</span>
              <input name="imagem" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s4">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $risco->nome }}">
                <label for='nome'>Nome: </label>
            </div>
            <div class="input-field col s8">
            <label for='descricao' title='Descrição'>Descrição: </label>
            <input type="text" id="descricao" name="descricao" value="{{ $risco->descricao }}">
            </div>
        </div><br><br>
</div>
<div class="col s12 m2 left">
    <a href="{{ url()->previous() }}">
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
<form action=" {{ route('riscos.destroy', ['risco' => $risco->id]) }}" method="POST">
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
