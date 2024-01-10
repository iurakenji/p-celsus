@extends('layouts.app')

@section('titulo')
Matérias-Primas
@endsection

@section('conteudo')

<br><br>
    <form action=" {{ route('mps.pesquisa') }} " method="post" >
        <div class="row">
        @csrf
        <div class="col m4 offset-m1">
            <a href="{{ route('mps.create') }}">
            <div class="waves-effect waves-light btn blue-grey darken-4 hoverable center-align white-text container">
                    <i class="material-icons">add</i>
                    Novo Registro
            </div>
        </a>
        </div>

        <div class="col offset-m1 m3">
            <div class="input-field">
                <input type="text" id="chave" name="chave">
                <label for='codigo'>Pesquisar: </label>
            </div>
        </div>
        <div class="col s12 m3 right">
            <button class="waves-effect blue-grey darken-4
            white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Pesquisar">
                <i class="material-icons">search</i>  Pesquisar
            </button>
        </div>
        </div>
        </form>


    <div class="row center" style="margin: 0px 20px">
        <h5>Matérias-Primas</h5><br>
        <table class="highlight striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Forma</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mps as $mp)
                <tr>
                    <td style="width: 10%">{{ $mp->codigo }}</td>
                    <td style="width: 50%">{{ $mp->nome }}</td>
                    <td style="width: 15%">{{ $mp->tipo->nome }}</td>
                    <td style="width: 10%">{{ $mp->forma }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.show', ['mp' => $mp->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $mps->links('includes.pagination') }}
    </div>
@endsection
