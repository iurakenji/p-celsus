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
      <div class="card-panel blue-grey darken-4 hoverable center-align white-text valign-wrapper">
        <i class="medium material-icons">perm_identity</i>  Tipos de Acessos
</div>
    </div>
    </a>
    <a href="{{ route('mps.index') }}">
        <div class="col s12 m2">
          <div class="card-panel blue-grey darken-4 hoverable center-align white-text valign-wrapper">
            <i class="medium material-icons">art_track</i>  Matérias-Primas
          </div>
        </div>
    </a>
    <a href="{{ route('setors.index') }}">
        <div class="col s12 m2">
          <div class="card-panel blue-grey darken-4 hoverable center-align white-text valign-wrapper">
            <i class="medium material-icons">apps</i>  Setores</div>
        </div>
    </a>
    <a href="{{ route('riscos.index') }}">
      <div class="col s12 m2 center-align">
        <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
          <i class="medium material-icons">error_outline</i>  Riscos</div>
      </div>
  </a>
    <a href="{{ route('acaos.index') }}">
      <div class="col s12 m2 center-align">
        <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
          <i class="medium material-icons">beenhere</i>  Controle de Acesso</div>
      </div>
  </a>
  <a href="{{ route('armazenamentos.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">border_all</i>  Tipos de Armazenamento</div>
    </div>
  </a>
  <a href="{{ route('fracionamentos.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">branding_watermark</i>  Fracionamentos</div>
    </div>
  </a>
  <a href="{{ route('grupodescartes.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">delete</i>  Grupos de Descarte</div>
    </div>
  </a>
  <a href="{{ route('locals.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">dashboard</i>  Locais de Armazenamento</div>
    </div>
  </a>
  <a href="{{ route('usuarios.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">assignment_ind</i>  Usuários</div>
    </div>
  </a>
  <a href="{{ route('referencias.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">assignment</i>  Referências</div>
    </div>
  </a>
  <a href="{{ route('fornecedors.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">group</i>  Fornecedores</div>
    </div>
  </a>
  <a href="{{ route('tipos.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">list</i>  Tipos de Insumos</div>
    </div>
  </a>
  <a href="{{ route('dados') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">import_export</i>  Dados</div>
    </div>
  </a>
  <a href="{{ route('dados') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">local_pharmacy</i>  Tratamentos</div>
    </div>
  </a>
  <a href="{{ route('dados') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">location_searching</i>  Análises</div>
    </div>
  </a>
  <a href="{{ route('observacaos.index') }}">
    <div class="col s12 m2 center-align">
      <div class="card-panel blue-grey darken-4 hoverable white-text valign-wrapper">
        <i class="medium material-icons">speaker_notes</i>  Observações de MP's</div>
    </div>
  </a>

</div>

@endsection
