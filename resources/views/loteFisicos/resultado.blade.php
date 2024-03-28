@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;
    use App\Models\Referencia;
    use App\Models\varCategorica;

    $referencias = Referencia::all();
    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');

@endphp

@section('titulo')
Análise de Insumos
@endsection

@section('conteudo')
<br>
<div class="row text-center">
    <div class="col">
        <h4>Análise de Insumo: {{$lote->mp->codigo.' - '.$lote->mp->nome}}</h4>
    </div>
</div><hr>
<div class="text-start ms-4">
  <h5> Resultados das Análises </h5>
</div>
<div class="accordion accordion-flush" id="accordionAnalises">
    @foreach ($lote->analises as $analise)
    <h2 class="accordion-header">
        <button class="accordion-button collapsed {{$analise->resultado == '' ? 'text-danger' : 'text-success'}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$analise->id}}" aria-expanded="false" aria-controls="flush-collapse{{$analise->id}}">
          {{$analise->nome}}
        </button>
      </h2>
    <form action=" {{ route('loteFisicos.store', ['lote' => $lote->id])}} " method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="mp_id" value="{{$lote->mp->id}}">
    <div id="flush-collapse{{$analise->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionAnalises">
        <div class="accordion-body">
        <div class="accordion-item">

            @if ($analise->tipo == 'Categórica Nominal')
            <div class="row justify-content-evenly">
                <div class="col-4">
                    Especificação: <b> {{$analise->pivot->especificacao}}</b> <br>
                </div>
                <div class="col-4">
                    Referência: <b> {{Referencia::where('id', $analise->pivot->referencia_id)->value('nome')}}</b>
                </div>
            </div>
                <hr>
            <div class="col-12">
                <label class="form-label" for='resultado'>Resultado: </label>
                <input class="form-control" placeholder="Resultado"  type="text" id="resultado" name="resultado">
            </div>
            @endif

            @if ($analise->tipo == 'Categórica Ordinal')
            <div class="row justify-content-evenly">
                <div class="col-6">
                    Especificação: 
                    @if ($analise->pivot->lim_inf != $analise->pivot->lim_inf)
                        <b> De {{VarCategorica::where('id', $analise->pivot->lim_inf)->value('nome')}} a {{VarCategorica::where('id', $analise->pivot->lim_inf)->value('nome')}}</b> <br>
                    @endif
                    @if ($analise->pivot->lim_inf == $analise->pivot->lim_inf)
                        <b> {{VarCategorica::where('id', $analise->pivot->lim_inf)->value('nome')}}</b> <br>
                    @endif
                </div>
                <div class="col-3">
                    Referência: <b> {{Referencia::where('id', $analise->pivot->referencia_id)->value('nome')}}</b>
                </div>
            </div>
                <hr>
            <div class="col-12">
                <label class="form-label" for='resultado'>Resultado: </label>
                <select class="form-select" id="resultado" name="resultado">
                    @php
                        $varCategoricas = varCategorica::where('analise_id', $analise->id)->get();
                    @endphp
                    @foreach ($varCategoricas as $varCategorica)
                        <option value="{{ $varCategorica['ordem'] }}">{{ $varCategorica['nome'] }}</option>
                    @endforeach
                </select>
            </div>

            @endif

            @if (($analise->tipo == 'Numérica Contínua') || ($analise->tipo == 'Numérica Discreta'))
                <div class="input-field col s3">
                    <input placeholder="Limite inferior"  type="number" id="lim_inf" name="lim_inf">
                    <label for='nome'>Limite Inferior: </label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="Limite superior"  type="number" id="lim_sup" name="lim_sup">
                    <label for='nome'>Limite Superior: </label>
                </div>
            @endif
            
            <div class="d-grid gap-4 d-md-flex justify-content-md-center">
                <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
                <i class="material-icons">save</i>  Salvar
                </button>
            </div>
        </div>
        </div>
    </div>
    </form>
    @endforeach
</div>

        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('loteFisicos.index') }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar (Cancelar)
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
        </div>

@endsection