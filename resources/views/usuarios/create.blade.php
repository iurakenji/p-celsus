@extends('layouts.app')

@section('titulo')
Usuário - Novo Usuário
@endsection

@php
    use App\Models\tipo_acesso;

    $tipo_acessos = tipo_acesso::all('id', 'nome');
@endphp

@section('conteudo')
<br>
    <div class="text-center">
        <h4>Novo Usuário</h4><hr>
    </div>

        <form action=" {{ route('usuarios.store') }} " method="post" style="margin: auto;">
            @csrf
            <input type="hidden" name="_method" value="PUT">
                <div class="row m-2 w-auto">
                    <div class="col-4">
                    <label class="form-label" for='login'>Login: </label>
                    <input class="form-control" placeholder="Login de Usuário"  type="text" id="login" name="login">
                    </div>
                <div class="col-5">
                    <label class="form-label" for='nome'>Nome: </label>
                    <input class="form-control" placeholder="Nome Completo"  type="text" id="nome" name="nome">
                </div>
                <div class="col-3">
                    <label class="form-label" for='tipo_acesso'>Tipo de Acesso: </label><br>
                    <select class="form-select" id="tipo_acesso" name="tipo_acesso">
                        @foreach ($tipo_acessos as $tipo_acesso)
                            <option value="{{ $tipo_acesso['id'] }}">{{ $tipo_acesso['nome'] }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            <div class="row m-2 w-auto">
                <div class="col-4">
                <label class="form-label" for='conselho' title='Conselho'>Conselho: </label>
                <input class="form-control" type="text" id="conselho" name="conselho">
                </div>
                <div class="col-4">
                <label class="form-label" for='registro' title='Nº Registro'>Registro: </label>
                <input class="form-control" type="text" id="registro" name="registro">
                </div>
                <div class="col-4">
                <label class="form-label" for='titulo' title='titulo'>Título: </label>
                <input class="form-control" type="text" id="titulo" name="titulo">
                </div>
            </div>

            <div class="row m-2">
                <div class="col-5">
                <label class="form-label" for='email' title='email'>E-mail: </label>
                <input class="form-control" type="email" id="email" name="email">
                </div>
                <div class="col-4">
                    <legend class="col-form-label">Gênero:</legend>
                    <div id="checkb" class="form-check form-check-inline">
                      <input class="form-check-input" id="M" name="genero" type="radio" value="M" />
                      <label class="form-check-label" for="M">Masculino</label>
                    </div>
                    <div id="checkb" class="form-check form-check-inline">
                      <input class="form-check-input" id="F" name="genero" type="radio" value="F" />
                      <label class="form-check-label" name="F">Feminino</label>
                    </div>
                    <div id="checkb" class="form-check form-check-inline">
                      <input class="form-check-input" id="O" name="genero" type="radio" value="O"  />
                      <label class="form-check-label" name="O">Outro</label>
                    </div>
                </div>
                <div class="col-3">
                    <legend class="col-form-label">‎ </legend>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ativo" name="ativo" value="1"  />
                        <label class="form-check-label" for="ativo">Acesso Ativo</label>    
                    </div>
                </div>
            </div>
            <br>

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



