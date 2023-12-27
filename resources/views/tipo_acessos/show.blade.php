@extends('layouts.app')


@section('titulo')
Tipo de Acesso {{ $tipo_acesso->nome }}
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px ">
        <h5>{{ $tipo_acesso->nome }}</h5><br>

        <form action=" {{ route('tipo_acessos.edit', ['tipo_acesso' => $tipo_acesso->id]) }} " method="get" style="margin: auto;">
            @csrf
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
            <input type="submit" value="Salvar" class="waves-effect waves-light btn lime darken-4" name="bt_entrar"><br><br>
        </form>
    </div>

    <footer class="row left">
        <a href="{{ route('tipo_acessos.index') }}">Voltar</a>
    </footer>
@endsection
