<?php

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Controllers\PagesController;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>

<!DOCTYPE html>
  <html lang="pt-BR">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="{{asset('/styles.css')}}" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



</head>
<body>
    @section('header')
    <nav style = "color:azure; margin-bottom: 0px; padding: 0px 0px 10px 0px; background-color: #8a7741;">
    <div class="nav_wrapper">
        <a href=" {{ route('home') }} " class="brand-logo" style="margin-left: 1%">p-Celsus</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href=" {{ route('mps') }} ">Matérias-Primas</a></li>
                    <li><a href=" # ">Análises</a></li>
                    <li><a href=" # ">Lotes</a></li>
                    <li><a href=" # ">Fornecedores</a></li>
                    <li><a href=" {{ route('usuarios') }} ">Usuários</a></li>
                </ul>
    </div>
    </nav>
    @show
    <div class="row" style="height: 77vh;">
    @section('sidebar')
        @component('components.sidebar')
            @slot('paragrafo')
            Texto
            @endslot
        @endcomponent
    @show

    <div class="col s12"  style="height: auto;">
        @yield('conteudo')
    </div>
    </div>
    <div class="row container">
        <small class="page-footer" style="color: black"><center>p-celsus - Controle de Qualidade Essentia Pharma - Logado como <b>{{ $user['login'] ?? 'Anônimo'}}.</b> <a href='{{ route('login.logout') }}'>(sair)</a> </center></small>
    </div>
    </body>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </html>
