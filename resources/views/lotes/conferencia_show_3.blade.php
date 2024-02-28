@extends('layouts.app')

@php

    use App\Models\Fornecedor;
    use App\Models\Armazenamento;
    use App\Models\Referencia;
    use App\Models\varCategorica;
    use Illuminate\Support\Number;

    $fornecedors = Fornecedor::all('id', 'nome');
    $armazenamentos = Armazenamento::all('id', 'nome');
    $referencias = Referencia::all('id', 'nome');

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

<div class="row" style="margin: 0px 20px ">
        @if ($analises->count() != 0)
        <div class="accordion accordion-flush mb-5" id="accordionFlush">
                @foreach ($analises as $analise)
                <form action="{{ route('lotes.conferencia_show_3_save', ['mp' => $mp->id, 'lote' => $lote->id]) }}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="id" value="{{$analise->id}}">
                  <input type="hidden" name="lote_id" value="{{$lote->id}}">
                  <input type="hidden" name="analise_id" value="{{$analise->id}}">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$analise->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                          <div class="col-12">
                              {{$analise->analise->nome}}
                          </div>
                      </button>
                    </h2>
                    <div id="flush-{{$analise->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                          @if ($analise->analise->tipo == 'Categórica Nominal')
                          <div class="row mx-1 w-auto">
                            <div class="col-12">
                                <label class="form-label" for='cas'>Especificação: </label>
                                <input class="form-control" type="text" id="especificacao" name="especificacao" value="{{$analise->especificacao}}">
                            </div>
                          </div>
                          @endif
                          @if ($analise->analise->tipo == 'Categórica Ordinal')
                          <div class="row mx-1 w-auto">
                            <div class="col-6">
                                @php
                                    $varCategoricas = varCategorica::where('analise_id', $analise->analise_id)->get();
                                @endphp
                                <label class="form-label" for='lim_inf'>Limite Inferior: </label>
                                <select class="form-select" id="lim_inf" name="lim_inf">
                                  @foreach ($varCategoricas as $varCategorica)
                                      <option value="{{ $varCategorica['ordem'] }}" {{($analise->lim_inf) == $varCategorica['ordem'] ? 'selected' : '' }}>{{ $varCategorica['nome'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for='lim_sup'>Limite Superior: </label>
                                <select class="form-select" id="lim_sup" name="lim_sup">
                                  @foreach ($varCategoricas as $varCategorica)
                                      <option value="{{ $varCategorica['ordem'] }}" {{($analise->lim_sup) == $varCategorica['ordem'] ? 'selected' : '' }}>{{ $varCategorica['nome'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>
                          @endif
                          @if ($analise->analise->tipo == 'Numérica Contínua' || $analise->tipo == 'Numérica Discreta')
                          <div class="row mx-1 w-auto">
                            <div class="col-6">
                                <label class="form-label" for='lim_inf'>Limite Inferior: </label>
                                <input class="form-control" type="text" id="lim_inf" name="lim_inf" value="{{$analise->lim_inf.$analise->analise->unidade}}">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for='lim_sup'>Limite Superior: </label>
                                <input class="form-control" type="text" id="lim_sup" name="lim_sup" value="{{$analise->lim_sup.$analise->analise->unidade}}">
                            </div>
                          </div>
                          @endif
                          <div class="row mx-1 w-auto">
                            <div class="col-4 me-4">
                              <label class="form-label" for='cas'>Referência: </label>
                              <select class="form-select" id="referencia_id" name="referencia_id">
                                @foreach ($referencias as $referencia)
                                    <option value="{{ $referencia['id'] }}" {{($analise->referencia_id) == $referencia['id'] ? 'selected' : '' }}>{{ $referencia['nome'] }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="ms-3 col-3">
                              <legend class="col-form-label">‎ </legend>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="informativo" name="informativo" value="1" @checked(old('informativo', $analise->informativo)) />
                                  <label class="form-check-label" for="informativo">Informativo</label>
                              </div>
                            </div>
                            <div class="col-3">
                              <legend class="col-form-label">‎ </legend>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="analise_cq" name="analise_cq" value="1" @checked(old('analise_cq', $analise->analise_cq)) />
                                  <label class="form-check-label" for="analise_cq">Análise CQ</label>
                              </div>
                            </div><br>
                          <div class="mx-4 gap-4 text-center">
                              <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_salvar" value="Salvar">
                                <i class="material-icons">save</i> Salvar
                              </button>
                              <a href="{{ route('lotes.conferencia_show_3_delete', ['mp' => $mp->id, 'lote' => $lote->id, 'id' => $analise->id]) }}">
                                <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="button" name="bt_salvar" value="Salvar">
                                  <i class="material-icons">delete</i> Apagar
                                </button>
                              </a>
                          </div>
                      </div>
                    </div>
                  </div>
                      </form> 
                @endforeach
                @endif
                <br>
                @if ($analises->count() == 0)
                <p>Ainda não há análises definidas para este lote.</p>
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
                                Conjunto padrão  embalagem
                                <a href="route('lotes.conferencia_show_3_addset', ['mp' => $mp->id, 'lote' => $lote->id, 'set' => 'embalagem'])"><span class="badge bg-primary rounded-pill">Inserir</span></a>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Conjunto padrão cápsula
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
<hr>

        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-3">
            <a href="{{ route('lotes.conferencia_show_2', ['mp' => $mp->id, 'lote' => $lote->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>

            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                Próximo  <i class="material-icons">arrow_forward</i>
            </button>
        </div>

        <br>
@endsection

