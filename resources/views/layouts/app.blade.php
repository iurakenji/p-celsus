<?php

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Controllers\PagesController;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
//dd($user);
if ($user == null) {
  route('login.logout');
}
?>

<!DOCTYPE html>
  <html lang="pt-BR">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="description" content="Plataforma de informações de insumos Essentia Pharma">
    <meta name="author" content="Kendji Iura">
    <meta name="robots" content="noindex, follow">
    <title>ρ-celsus - Controle de Qualidade Essentia Pharma - @yield('titulo')</title>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

     <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>
<body>
  <body>
    @section('header')

    <nav class="navbar navbar-expand-lg sticky-top w-100" style = "color:azure; margin-bottom: 0px; padding: 10px 0px 15px 20px; background-color: #8a7741;">

        <a href=" {{ route('home') }} " class="navbar-brand text-white">ρ-Celsus</a>

        <ul class="nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle  text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Suprimentos</a>
              <ul class="dropdown-menu navbar-scroll ">
                    <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('lotes.mp_index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg></i>  Lotes</a></li>
                    <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('fornecedors.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                      </svg>  Fornecedores</a></li>
                    <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('tipos.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-radios" viewBox="0 0 16 16">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0m7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5M3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6m0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                      </svg>  Tipos de Insumos</a></li>
              </ul>
            </li>
            <ul class="nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle  text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">GQ</a>
                  <ul class="dropdown-menu navbar-scroll ">
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('lotes.conferencia_index') }}"><i class="assignment_turned_in"></i>  Conferência de Lotes (GQ)</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('observacaos.index') }}"><i class="speaker_notes"></i>  Observações de MP's</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('mps.index') }}"><i class="art_track"></i>  Matérias-Primas </a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('armazenamentos.index') }}"><i class="border_all"></i>  Tipos de Armazenamento </a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('referencias.index') }}"><i class="assignment"></i>  Referências</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('analises.index', ['tipo_id' => '0']) }}"><i class="location_searching"></i>  Análises</a></li>
                  </ul>
                </li>
                <ul class="nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">CQ</a>
                      <ul class="dropdown-menu navbar-scroll ">
                        <li><a class="dropdown-item icon-link icon-link-hover" href="{{ route('loteFisicos.index') }}">Recebimento de Insumos</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Análises</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Consultar Insumos</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Envase</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Revisão de Laudos</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Liberação de Laudos</a></li>
                        <li><a class="dropdown-item icon-link icon-link-hover" href="#">Solicitações de Insumos</a></li>
                      </ul>
                    </li>
          </ul>
          <ul class="nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerencial</a>
              <ul class="dropdown-menu navbar-scroll ">
                <li><a class="dropdown-item" href="{{ route('tipo_acessos.index') }}"><i class="perm_identity"></i>  Tipos de Acessos</a></li>
                <li><a class="dropdown-item" href="{{ route('setors.index') }}"><i class="apps"></i>  Setores</a></li>
                <li><a class="dropdown-item" href="{{ route('riscos.index') }}"><i class="error_outline"></i>  Riscos </a></li>
                <li><a class="dropdown-item" href="{{ route('acaos.index') }}"><i class="beenhere"></i>  Controle de Acesso</a></li>
                <li><a class="dropdown-item" href="{{ route('fracionamentos.index') }}"><i class="branding_watermark"></i>  Fracionamentos</a></li>
                <li><a class="dropdown-item" href="{{ route('grupodescartes.index') }}"><i class="delete"></i>  Grupos de Descarte</a></li>
                <li><a class="dropdown-item" href="{{ route('locals.index') }}"><i class="dashboard"></i>  Locais de Armazenamento</a></li>
                <li><a class="dropdown-item" href="{{ route('usuarios.index') }}"><i class="assignment_ind"></i>  Usuários  </a></li>
                <li><a class="dropdown-item" href="{{ route('dados') }}"><i class="import_export"></i>  Dados</a></li>
                <li><a class="dropdown-item" href="{{ route('dados') }}"><i class="local_pharmacy"></i>  Tratamento</a></li>

              </ul>
            </li>
        </ul>

    </nav>
    @show
    <div class="col w-auto">
        @yield('conteudo')
    </div>
    </div><br>
    <small>
        <footer class="text-center fixed-bottom">ρ-celsus - Controle de Qualidade Essentia Pharma - Logado como <b>{{ $user['login'] ?? 'Anônimo'}}.</b> <a href='{{ route('login.logout') }}'>(sair)</a> </center></footer>
    </small>
    </body>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </html>
