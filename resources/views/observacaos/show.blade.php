@extends('layouts.app')


@section('titulo')
Observações de Matérias-Primas - {{ $observacao->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>{{ $observacao->codigo.' - '.$observacao->nome }}</h5><br>
</div>
    <form action=" {{ route('observacaos.update', ['observacao' => $observacao->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
            <div class="row">
            <div class="input-field col s6">
                <input placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $observacao->nome }}">
                <label for='nome'>Nome: </label>
            </div>
            <label for='tipo'>Tipo: </label>
            <div class="input-field col s6">
                <select class="browser-default" id="tipo" name="tipo">
                        <option value="Matéria-Prima" {{$observacao->forma == 'Matéria-Prima' ? 'selected' : '' }}>Matéria-Prima</option>
                        <option value="Método Analítico" {{$observacao->forma == 'Método Analítico' ? 'selected' : '' }}>Método Analítico</option>
                        <option value="Análise de Lote" {{$observacao->forma == 'Análise de Lote' ? 'selected' : '' }}>Análise de Lote</option>
                        <option value="Lote" {{$observacao->forma == 'Lote' ? 'selected' : '' }}>Lote</option>
                        <option value="Movimentação" {{$observacao->forma == 'Movimentação' ? 'selected' : '' }}>Movimentação</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12">
            <label for='descricao' title='Descrição'>Texto: </label>
            <input type="text" id="descricao" name="descricao" value="{{ $observacao->observacao }}">
            </div>
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
<form action=" {{ route('observacaos.destroy', ['observacao' => $observacao->id]) }}" method="POST">
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

