@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

    switch ($lote->situacao) {
        case 'Liberado':
            $cor = 'LimeGreen';
            break;

        case 'Aguardando Conferência':
            $cor = 'GoldenRod';
            break;

        case 'Em Espera':
            $cor = 'Maroon';
            break;
        default:
            $cor = 'Black';
            break;
    }



@endphp

@section('titulo')
Observações - {{ $lote->mp->nome }}
@endsection

@section('conteudo')

<div class="row">
    <div class="col m12 center">
        <h5> 4. Observações </h5>
    </div>
</div>
<div class="row">
    <div class="col m12 center">
        <h6><b><span class="grey-text text-darken-5">Insumo:</span></b> {{$mp->codigo.' - '.$mp->nome }}    </h6>
   </div>
</div>
<div class="row center" style="margin: 0px 20px ">
    <form action=" {{ route('lotes.conferencia_show_5', ['mp' => $mp->id, 'lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <table class="highlight">
            <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Item Name</th>
                    <th data-field="price">Item Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($analises as $analise)
                <tr>
                    <td>{{$analise->nome}}</td>
                    <td>{{$analise->tipo}}</td>
                    <td>{{$analise->unidade}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


<br>
</div>
<div class="col s12 m2 left">
    <a href="{{ route('lotes.conferencia_show_3', ['mp' => $mp->id, 'lote' => $lote->id]) }}">
        <div class="waves-effect waves-light btn blue-grey darken-4
        hoverable center-align white-text valign-wrapper container">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>
</div>
<div class="col s12 m2 right">
    <button class="waves-effect teal darken-4
    white-text btn waves-light hoverable btn container" type="submit" name="bt_salvar" value="Salvar">
    Próximo  <i class="material-icons">navigate_next</i>
    </button>
</div>
</form>
@if (2<1)
<form action=" {{ route('lotes.destroy', ['lote' => $lote->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="col s12 m2 right">
        <button class="waves-effect red lighten-1
        white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endif
@endsection
