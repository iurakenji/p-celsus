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
        <a href="#" class="brand-logo" style="margin-left: 1%">p-Celsus</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href=" # ">Usuarios</a></li>
                </ul>
    </div>
    </nav>
    @show
    <div class="row" style="height: 77vh;">
    @section('sidebar')
        <div class="col s2 menu" style="height: 79vh;">
            <ul>
                <li class="z-depth-1"><a href="fc.php">Cálculo de FC</a></li>
                <li class="z-depth-1"><a href="mps.php">Matérias Primas</a></li>
                <li class="z-depth-1"><a href="analises.php">Análises</a></li>
                <li class="z-depth-1"><a href="fornecedores.php">Fornecedores</a></li>
                <li class="z-depth-1"><a href="connect.php">Entrada de MP's</a></li>
                <li class="z-depth-1"><a href="enzimas.php">Cálculo de Atividade Enzimática</a></li>
                <li class="z-depth-1"><a href="fichaprod.php">Auxiliar p/ Ficha de Produção</a></li>
                <li class="z-depth-1"><a href="usuarios.php">Usuários</a></li>
            </ul>
        </div>
    @show

    <div class="col s10"  style="height: 85vh;">
        @yield('conteudo')
    </div>
    </div>
        <small><center>p-celsus - Controle de Qualidade Essentia Pharma - Logado como {{ $usuario }}.<b>  </b> <a href='/php/logout.php'>(sair)</a> </center></small>
</body>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </html>
