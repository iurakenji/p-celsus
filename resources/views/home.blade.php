@extends('layouts.app')

@section('titulo')
Página Principal
@endsection

@section('sidebar')

@section('conteudo')

<div class="row">
    <a href="{{ route('tipo_acessos.index') }}">
    <div class="col s12 m2">
      <div class="card-panel teal hoverable center-align white-text valign-wrapper">
        <i class="material-icons">perm_identity</i>  Tipos de Acessos
      </div>
    </div>
    </a>
    <a href="{{ route('mps.index') }}">
        <div class="col s12 m2">
          <div class="card-panel teal hoverable center-align white-text valign-wrapper">
            <i class="material-icons">all_out</i>  Matérias-Primas
          </div>
        </div>
        </a>
</div>

@endsection
