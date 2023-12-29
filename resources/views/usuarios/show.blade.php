@extends('layouts.app')

@section('titulo')
Usuário {{ $usuario->nome }}
@endsection

@php
    use App\Models\tipo_acesso;

    $tipo_acessos = tipo_acesso::all('id', 'nome');
@endphp

@section('conteudo')

    <div class="row center" style="margin: 0px 20px ">
        <h5>{{ $usuario->nome }}</h5><br>
    </div>

        <form action=" {{ route('usuarios.edit', ['usuario' => $usuario->id]) }} " method="post" style="margin: auto;">
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
                    @foreach ($tipo_acessos as $tipo)
                        <option value="{{ $tipo['id'] }}" {{$usuario->tipo_acesso_id == $tipo['id'] ? 'selected' : '' }}>{{ $tipo['nome'] }}</option>
                    @endforeach
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
            <div class="row center">
            <label>
            <input type="checkbox" id="ativo" name="ativo" value="1" @checked(old('ativo', $usuario->ativo)) />
            <span>Acesso Ativo</span>
            </label></div><br><br>
            <div class="row">
                <div class="col s12 m2 left">
                    <a href="{{ route('usuarios.index') }}">
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
            <form action=" {{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <div class="col s12 m2 right">
                    <button class="waves-effect red lighten-1
                    white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Apagar">
                        <i class="material-icons">delete</i>  Apagar
                    </button>
            
                </div>
            </form>
        </div>
@endsection
