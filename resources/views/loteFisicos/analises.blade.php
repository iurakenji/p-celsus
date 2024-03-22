@extends('layouts.app')

@section('titulo')
Lotes
@endsection

@php
    use App\Models\Tipo;
    use App\Models\Fornecedor;
    use App\Models\GrupoDescarte;

    $tipos = Tipo::all('id', 'nome');
    $fornecedors = Fornecedor::all('id', 'nome');
    $grupodescartes = GrupoDescarte::all('id', 'nome');

    $situacaos = ['Aguardando Conferência','Aguardando Análise','Aguardando Envase','Aguardando Tratamento','Aguardando Produção','Pendente','Aguardando Aprovação','Aguardando Liberação','Liberado com AR','Reprovado','Devolvido','Descartado','Segregado','Liberado']
@endphp

@section('conteudo')
<form action=" {{ route('loteFisicos.analises_index') }} " method="post" >
    @csrf
    <div class="row mx-3  align-items-center w-auto">
    <div class="col-10">
        <div class="input-field">
            <label class="col-form-label" for='codigo'>Pesquisar: </label>
            <input class="form-control" type="text" id="chave" name="chave">
        </div>
    </div>
    <div class="col text-center mt-4">
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle 
        border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
            <i class="material-icons">search</i>  Filtrar
        </button>
    </div>

    <div class="accordion accordion-flush" id="query">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Opções de Filtragem
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row mx-1 w-95">
                    <div class="col-4">
                        <label class="form-label" for='situacao'>Situação: </label>
                        <select class="form-select" id="situacao" name="situacao">
                                <option value="todas">Todas</option>
                            @foreach ($situacaos as $situacao)
                                <option value="{{ $situacao }}">{{ $situacao }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-4">
                    <label class="form-label" for='forma'>Forma: </label>
                    <select class="form-select" id="forma" name="forma">
                            <option value="Sólido" >Todas</option>
                            <option value="Sólido" >Sólido</option>
                            <option value="Líquido" >Líquido</option>
                            <option value="Semi-Sólido">Semi-Sólido</option>
                            <option value="Semi-Acabado">Semi-Acabado</option>
                            <option value="Produto Final">Produto Final</option>
                            <option value="Outros">Outros</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label" for='tipo_id'>Tipo: </label>
                    <select class="form-select" id="tipo_id" name="tipo_id">
                            <option value="Todos">Todos</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo['id'] }}">{{ $tipo['nome'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mx-1 d-flex justify-content-evenly">
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tratado" name="tratado" value="1" />
                    <label class="form-check-label" for="tratado">Matéria-Prima Tratada</label>
                </div>
            </div>
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lacto" name="lacto" value="1" />
                    <label class="form-check-label" for="lacto">Lactobacilo / Probiótico</label>
                </div>
            </div>
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tintura" name="tintura" value="1" />
                    <label class="form-check-label" for="tintura">Tintura / Extrato Glicólico</label>
                </div>
            </div>
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="micronizado" name="micronizado" value="1" />
                    <label class="form-check-label" for="micronizado">Micronizado</label>
                </div>
            </div>
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colorido" name="colorido" value="1" />
                    <label class="form-check-label" for="colorido">Colorido</label>
                </div>
            </div>
            <div class="col">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="odor" name="odor" value="1" />
                    <label class="form-check-label" for="odor">Com Odor Forte</label>
                </div>
            </div>
        </div>

            </div>
          </div>
        </div>
      </div>
   
</div>
</form>
<hr>
<div class="text-center">
    <h4>Lotes Pendentes</h4>
</div>


    <table class="table table-striped table-hover m-2 align-middle">
        <thead>
            <tr>
                <th style="width: 10%">Situação</th>
                <th style="width: 30%">Insumo</th>
                <th style="width: 15%">Fornecedor</th>
                <th style="width: 15%">Entrada</th>
                <th style="width: 15%">Tipo</th>
                <th style="width: 10%"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($lotes as $lote)
            @php
            switch ($lote->situacao) {
                case 'Aguardando Análise':
                    $cor = 'LimeGreen';
                    break;

                case 'Aguardando Conferência':
                    $cor = 'DarkGoldenRod';
                    break;

                case 'Em Espera':
                    $cor = 'Maroon';
                    break;
                default:
                    $cor = 'Black';
                    break;
            }
            @endphp
            <tr>
                <td style="width: 10%"><span style="color: {{ $cor }}">{{ $lote->situacao }}</span></td>
                <td style="width: 30%">{!! ($lote->urgente == 1 ? "<b class='text-danger'>URGENTE! - </b>" : '').$lote->mp->codigo.' - '.$lote->mp->nome !!}</td>
                <td style="width: 15%">{{ $lote->fornecedor->nome }}</td>
                <td style="width: 15%">{{ $lote->entrada }}</td>
                <td style="width: 15%">{{ $lote->mp->tipo->nome }}</td>
                <td class="text-center" style="width: 10%"><a href="{{ route('loteFisicos.edit', ['lote' => $lote->id]) }}" class="list"> Adicionar Resultados </a></td>
            </tr>

    @endforeach
</tbody>
    </table>
</div>

    <div class="row center">

{{ $lotes->links('includes.pagination') }}
    </div>
@endsection
