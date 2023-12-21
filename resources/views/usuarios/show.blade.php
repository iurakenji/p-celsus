@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px ">
        <h5>{{ $usuario->nome }}</h5><br>

        <form action=" {{ route('usuario.upsert') }} " method="post" style="margin: auto;">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Login de Usuário"  type="text" id="login" name="login" value="{{ $usuario->login }}">
                    <label for='login'>Login: </label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Nome Completo"  type="text" id="nome" name="nome" value="{{ $usuario->nome }}">
                    <label for='nome'>Nome: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                <label for='tipo_acesso'>Tipo de Acesso: </label>
                </div>
                <div class="input-field col s2">
                <select class="browser-default" id="tipo_acesso" name="tipo_acesso">
                    <option value="" disabled selected>Selecionar</option>
                    <option value="1">Técnico</option>
                    <option value="2">Farmacêutico</option>
                    <option value="3">GQ</option>
                </select>
                </div>
                <div class="input-field col s2">
                <label for='conselho' title='Conselho'>Conselho: </label>
                <input type="text" id="conselho" name="conselho" value="{{ $usuario->conselho }}">
                </div>
                <div class="input-field col s3">
                <label for='registro' title='Nº Registro'>Registro: </label>
                <input type="text" id="registro" name="registro" value="{{ $usuario->registro }}">
                </div>
                <div class="input-field col s3">
                <label for='titulo' title='titulo'>Título: </label>
                <input type="text" id="titulo" name="titulo" value="{{ $usuario->titulo }}">
                </div>
            </div>
            <div>
                <div class="input-field col s6">
                <label for='email' title='email'>E-mail: </label>
                <input type="email" id="email" name="email" value="{{ $usuario->email }}">
                </div>
                <div class="input-field col s6">
                <label for="password" title="Digite a Senha">Senha: </label>
                <input type="password" id="password" name="password" value="{{ $usuario->password }}">
                </div>
            </div>
            <label>
            <input type="checkbox" id="ativo" name="ativo" value="{{ $usuario->ativo }}" />
            <span>Acesso Ativo</span>
            </label><br><br>
            <input type="submit" value="Salvar" class="waves-effect waves-light btn lime darken-4" name="bt_entrar"><br><br>
        </form>
    </div>

    <footer class="row left">
        <a href="{{ route('usuarios.index') }}">Voltar</a>
    </footer>
@endsection
