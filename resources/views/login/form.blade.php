@if ($mensagem = Session::get('erro'))
    {{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

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

<body>
<h1 class="center-align">ρ-Celsus</h1>
<h4 class="center-align">Login</h4><br>
<div class="container center-align">
<form action=" {{ route('login.authenticate') }} " method="post"  style="margin: auto;">
    @csrf
    <label for='login' title='Selecione o usuário'>Usuário: </label>
    <input type="text" id="login" name="login" style="margin-left: 10px; max-width: 20%; padding-left: 10px"><br>
    <label for="password" title="Digite a Senha">Senha: </label>
    <input type="password" id="password" name="password" style="margin-left: 10px; max-width: 20%; padding-left: 10px"><br>
    <input type="submit" value="Entrar" class="waves-effect waves-light btn lime darken-4" name="bt_entrar" style="margin-left: 20px; margin-top: 20px;">
    </form>
</div>
</body>
