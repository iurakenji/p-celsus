@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;

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

    <form action=" {{ route('loteFisicos.store', ['lote' => $lote->id])}} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="mp_id" value="{{$lote->mp->id}}">
        <br>

        <div class="accordion accordion-flush border" id="accordionAnalises">
            @foreach ($lote->analises as $analise)
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$analise->id}}" aria-expanded="false" aria-controls="flush-collapse{{$analise->id}}">
                    {{$analise->nome}}
                  </button>
                </h2>
                <div id="flush-collapse{{$analise->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionAnalises">
                  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                </div>
              </div>
            @endforeach
        </div>

          <br>
        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('loteFisicos.index') }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
    </form>
        </div>

@endsection