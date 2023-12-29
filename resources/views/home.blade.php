@extends('layouts.app')

@section('titulo')
Página Principal
@endsection

@section('sidebar')

@section('conteudo')
<div class="row">
</div>

<div class="row">
    <a href="{{ route('tipo_acessos.index') }}">
    <div class="col s12 m2">
      <div class="card-panel lime darken-4 hoverable center-align white-text valign-wrapper">
        <i class="medium material-icons">perm_identity</i>  Tipos de Acessos
</div>
    </div>
    </a>
    <a href="{{ route('mps.index') }}">
        <div class="col s12 m2">
          <div class="card-panel lime darken-4 hoverable center-align white-text valign-wrapper">
            <i class="medium material-icons">art_track</i>  Matérias-Primas
          </div>
        </div>
    </a>
    <a href="{{ route('mps.index') }}">
        <div class="col s12 m2">
          <div class="card-panel lime darken-4 hoverable center-align white-text valign-wrapper">
            <i class="medium material-icons">apps</i>  Setores</div>
        </div>
    </a>
</div>

@endsection
