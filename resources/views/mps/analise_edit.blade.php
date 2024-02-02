@extends('layouts.app')

@php
    use App\Models\Referencia;
    use App\Models\varCategorica;

    $referencias = Referencia::all();
    $varCategoricas = varCategorica::where('analise_id','=', $id == 'novo' ? $analise->value('id') : $analise->value('analise_id') )->get();
@endphp

@section('titulo')
{{ $mp->nome }}
@endsection

@section('conteudo')
<div class="row">

</div>
<div class="row center" style="margin: 0px 20px ">
    <h5>
        {{ $mp->nome }} - {{ $analise->value('nome') }} </h5><br>
    <form action=" {{ route('mps.analise_save', ['mp' => $mp->id, 'id' => $id, 'analise' => $id == 'novo' ? $analise->value('id') : $analise->value('analise_id') ]) }} " method="get">
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
            @if ($analise->value('tipo') == 'Categórica Nominal')
            <div class="input-field col s4">
                <input placeholder="Especificação"  type="text" id="especificacao" name="especificacao" value=" {{ $id === 'novo' ? "" : $analise->value('especificacao') }} ">
                <label for='especificacao'>Especificação: </label>
            </div>
            @endif

            @if (($id == 'novo') && ($analise->value('tipo') == 'Categórica Ordinal'))

            <div class="input-field col s1">
                <label for='referencia'>Limite Inferior </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="lim_inf" name="lim_inf">
                    @foreach ($varCategoricas as $varCategorica)
                        <option value="{{ $varCategorica['ordem'] }}">{{ $varCategorica['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s1">
                <label for='referencia'>Limite Superior: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="lim_sup" name="lim_sup">
                    @foreach ($varCategoricas as $varCategorica)
                        <option value="{{ $varCategorica['ordem'] }}" >{{ $varCategorica['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if (($id != 'novo') && ($analise->value('tipo') == 'Categórica Ordinal'))
            <div class="input-field col s1">
                <label for='referencia'>Limite Inferior </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="lim_inf" name="lim_inf">
                    @foreach ($varCategoricas as $varCategorica)
                        <option value="{{ $varCategorica['ordem'] }}" {{ $analise->value('lim_inf') == $varCategorica['ordem'] ? 'selected' : '' }}>{{ $varCategorica['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-field col s1">
                <label for='referencia'>Limite Superior: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="lim_sup" name="lim_sup">
                    @foreach ($varCategoricas as $varCategorica)
                        <option value="{{ $varCategorica['ordem'] }}" {{$analise->value('lim_sup') == $varCategorica['ordem'] ? 'selected' : '' }} >{{ $varCategorica['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if (($analise->value('tipo') == 'Numérica Contínua') || ($analise->value('tipo') == 'Numérica Discreta'))
            <div class="input-field col s3">
                <input placeholder="Limite inferior"  type="number" id="lim_inf" name="lim_inf" value="{{ $id === 'novo' ? "" : $analise->value('lim_inf') }}">
                <label for='nome'>Limite Inferior: </label>
            </div>
            <div class="input-field col s3">
                <input placeholder="Limite superior"  type="number" id="lim_sup" name="lim_sup" value="{{ $id === 'novo' ? "" : $analise->value('lim_sup') }}">
                <label for='nome'>Limite Superior: </label>
            </div>
            @endif

            <div class="input-field col s1">
                <label for='referencia'>Referência: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="referencia_id" name="referencia_id">
                    @foreach ($referencias as $referencia)
                        <option value="{{ $referencia['id'] }}" {{$analise->value('referencia_id') == $referencia['id'] ? 'selected' : '' }}>{{ $referencia['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-field col s2">

            <label>
            <input type="checkbox" id="informativo" name="informativo" value="1" @checked(old('informativo', $analise->value('informativo')))/>
            <span>Informativo</span>
            </label>
        </div>
        <div class="input-field col s2">
            <label>
            <input type="checkbox" id="analise_cq" name="analise_cq" value="1" @checked(old('analise_cq', $analise->value('analise_cq')))/>
            <span>Análise CQ</span>
            </label>
        </div>

</div> <br><br>
<hr>

        <div class="row center" style="margin: 0px 20px ">
            <h5>Observações</h5><br>

        </div>
        <div class="row">
            <a href="{{ route('mps.analiseobs_index',  ['mp' => $mp->id, 'analise' => $id == 'novo' ? $analise->value('id') : $analise->value('analise_id') ] ) }}">
            <div class="col s12 m2 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                    <i class="material-icons">add</i>
                    Adicionar
            </div>

            </div>
            </a>
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
                        <td style="width: 10%"><a href=" {{ route('mps.analiseobs_destroy',  ['mp' => $mp->id, 'analise' => $id == 'novo' ? $analise->value('id') : $analise->value('analise_id'), 'observacao' => $observacao->id ] ) }} " class="list"> Excluir </a></td>
                    </tr>
                    @endforeach

        </tbody>
            </table>
        </div>

<hr>
<br><br>
</form>
@endsection
