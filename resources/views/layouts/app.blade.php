<!DOCTYPE html>
  <html lang="pt-BR">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="description" content="página de teste">
    <meta name="author" content="Kendji Iura">
    <meta name="robots" content="noindex, follow">
    <title>ρ-celsus - Controle de Qualidade Essentia Pharma - @yield('title')</title>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

     <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="\public\css\styles.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    <header>
    <div class="row card-pane z-depth-1 but_menu" style = height: 20vh;">
            <div class="col s12">
                <h3 class="valign-wrapper">p-Celsus</h3>
            </div>
    </div>
    <br>
    </header>
    <div class="row" style="height: 70vh; border-style: solid;">
    @section('sidebar')

        <aside class="col s3">
            <ul>
                <li class="z-depth-1"><a href="fc.php" target="janela">Cálculo de FC</a></li>
                <li class="z-depth-1"><a href="mps.php" target="janela">Matérias Primas</a></li>
                <li class="z-depth-1"><a href="analises.php" target="janela">Análises</a></li>
                <li class="z-depth-1"><a href="fornecedores.php" target="janela">Fornecedores</a></li>
                <li class="z-depth-1"><a href="connect.php" target="janela">Entrada de MP's</a></li>
                <li class="z-depth-1"><a href="enzimas.php" target="janela">Cálculo de Atividade Enzimática</a></li>
                <li class="z-depth-1"><a href="fichaprod.php" target="janela">Auxiliar p/ Ficha de Produção</a></li>
                <li class="z-depth-1"><a href="usuarios.php" target="janela">Usuários</a></li>
            </ul>
        </aside>
    @show

    <div class="col s9 ">
        @yield('content')
    </div>
    </div>

    <footer>
        <small><center>p-celsus - Controle de Qualidade Essentia Pharma - Logado como <?php echo "<b>  </b> <a href='/php/logout.php'>(logout)</a>"; ?> </center></small>
    </footer>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>
