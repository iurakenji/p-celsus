@extends('layouts.app')

@php
    use App\Models\Referencia;
    use App\Models\Observacao;

    $observacaos = Observacao::all();
    $referencias = Referencia::all();
@endphp

@section('titulo')
{{ $analise->nome ?? 'Nova Análise'}} - {{ $mp->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>
        {{ $mp->nome }} - {{ $analise->nome }}</h5><br>
    <form action=" {{ route('mps.analise_save', ['mp' => $mp->id, 'id' => $analise->id]) }} " method="post">
        @csrf
        <div class="row">
        <div class="col s12 m2 left">
            <a href="{{ route('mps.analise_index', ['mp' => $mp]) }}">
                <div class="waves-effect waves-light btn blue-grey darken-4
                hoverable center-align white-text valign-wrapper container">
                    <i class="material-icons">arrow_back</i>
                    Voltar
                </div>
            </a>
        </div>
        <div class="col s12 m2 right">
            <button class="waves-effect teal darken-4
            white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Salvar">
                <i class="material-icons">save</i>  Salvar
            </button>
        </div>
        </div>
        <div class="row">
            @if ($analise->tipo == 'Categórica Nominal')
            <div class="input-field col s1">
                <label for='referencia'>Referência: </label>
            </div>
            @endif
            @if ($analise->tipo == 'Categórica Ordinal' || $analise->tipo == 'Numérica Contínua' || $analise->tipo == 'Numérica Discreta')
            <div class="input-field col s2">
                <input placeholder="Limite inferior"  type="number" id="lim_inf" name="lim_inf" value="">
                <label for='nome'>Limite Inferior: </label>
            </div>
            <div class="input-field col s2">
                <input placeholder="Limite superior"  type="number" id="lim_sup" name="lim_sup" value="">
                <label for='nome'>Limite Superior: </label>
            </div>
            @endif
            <div class="input-field col s5">
                <select class="browser-default" id="referencia_id" name="referencia_id">
                    @foreach ($referencias as $referencia)
                        <option value="{{ $referencia['id'] }}" >{{ $referencia['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-field col s2">
            <label for="informativo">
            <input type="checkbox" id="informativo" name="informativo" value="1"/>
            <span>Informativo</span>
            </label>
        </div>
        <div class="input-field col s2">
            <label for="analise_cq">
            <input type="checkbox" id="analise_cq" name="analise_cq" value="1" checked/>
            <span>Análise CQ</span>
            </label>
        </div>

</div> <br><br>
<hr>

        <div class="row center" style="margin: 0px 20px ">
            <h5>Observações</h5><br>

        </div>
        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Observação</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($observacaos as $observacao)
                    <tr>
                        <td style="width: 35%">{{ $observacao->nome }}</td>
                        <td style="width: 55%">{{ $observacao->observacao }}</td>
                        <td style="width: 10%"><a href=" # " class="list"> Adicionar </a></td>
                    </tr>
                    @endforeach
        </tbody>
            </table>
        </div>

<hr>
<br><br>
</form>
@endsection
