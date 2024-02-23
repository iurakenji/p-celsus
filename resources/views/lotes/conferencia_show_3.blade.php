@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;
    use Illuminate\Support\Number;

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
Informações de Lote - {{ $lote->mp->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4><b><span class="grey-text text-darken-4">Insumo:</span></b> {{$mp->codigo.' - '.$mp->nome }}    </h4>
</div><hr>
<div class="text-start ms-4">
        <h5> 3. Informações das Análises </h5>
</div>
<hr>
<div class="row center" style="margin: 0px 20px ">
    <form action=" {{ route('lotes.conferencia_show_4', ['mp' => $mp->id, 'lote' => $lote->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        @if ($analises->count() != 0)
        <div class="row">
            <div class="col-4 ms-3">
                Análise
            </div>
        </div>
        <hr>
        <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($analises as $analise)
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$analise->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="col-4">
                                    {{$analise->nome}}
                                </div>
                            </button>
                          </h2>
                          <div id="flush-{{$analise->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-center">
                                @if ($analise->tipo == 'Categórica Nominal')
                                    Especificação: <b>{{$analise->especificacao}}</b><br><br>
                                @endif
                                @if ($analise->tipo == 'Categórica Ordinal')
                                    Limite Inferior: <b>{{ (getCategorica($analise->id, $analise->lim_inf)) ? (getCategorica($analise->id, $analise->lim_inf)) : "Não informado"}}</b><br><br>
                                    Limite Superior: <b>{{(getCategorica($analise->id, $analise->lim_sup)) ? (getCategorica($analise->id, $analise->lim_sup)) : "Não informado"}}</b><br><br>
                                @endif
                                @if ($analise->tipo == 'Numérica Contínua' || $analise->tipo == 'Numérica Discreta')
                                    Limite Inferior: <b>{{$analise->lim_inf}}</b> {{$analise->unidade}}<br><br>
                                    Limite Superior: <b>{{$analise->lim_sup}}</b> {{$analise->unidade}}<br><br>
                                @endif
                                Informativo: <b> {{$analise->informativo == 0 ? 'Não' : 'Sim'}}</b><br><br>
                                Análise CQ: <b> {{$analise->analise_cq == 0 ? 'Não' : 'Sim'}}</b><br><br>
                            </div>
                          </div>
                        </div>
                @endforeach
                        @endif
                @if ($analises->count() == 0)
                <p>Ainda não há análises configuradas para este lote.</p>
                <button type="button" class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" data-bs-toggle="modal" data-bs-target="#setAnalises">
                    Adicionar um conjunto padrão de análises
                </button>  
                @endif
                <button type="button" class="ms-3 btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" data-bs-toggle="modal" data-bs-target="#analiseIndividual">
                    Adicionar nova análise individual
                </button>
                  <!-- Modal conjuntos de análises -->
                  <div class="modal fade" id="setAnalises" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Conjuntos de Análises</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Conjunto padrão insumo farmacêutico sólido
                                <a href="{{ route('lotes.conferencia_show_3_addset', ['mp' => $mp->id, 'lote' => $lote->id, 'set' => 'solido']) }}"><span class="badge bg-primary rounded-pill">Inserir</span></a>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Conjunto padrão insumo farmacêutico líquido
                                <a href="{{ route('lotes.conferencia_show_3_addset', ['mp' => $mp->id, 'lote' => $lote->id, 'set' => 'liquido']) }}"><span class="badge bg-primary rounded-pill">Inserir</span></a>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Conjunto embalagem
                                <a href="route('lotes.conferencia_show_3_addset', ['mp' => $mp->id, 'lote' => $lote->id, 'set' => 'embalagem'])"><span class="badge bg-primary rounded-pill">Inserir</span></a>
                              </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Análise individual -->
                  <div class="modal fade" id="analiseIndividual" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Conjuntos de Análises</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Aqui vai a lista de análises
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

        </div>

        <br>
        <div class="position-absolute bottom-0 start-50 mb-4 gap-4 d-md-flex translate-middle">
            <a href="{{ route('lotes.conferencia_show_2', ['mp' => $mp->id, 'lote' => $lote->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
                Próximo  <i class="material-icons">navigate_next</i>
            </button>
        </form><br>
        </div>
@endsection

