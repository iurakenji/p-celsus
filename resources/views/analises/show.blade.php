@extends('layouts.app')

@php
    use App\Models\Tipo;
    use App\Models\Observacao;

    $tipos = Tipo::all();
@endphp
@section('titulo')
Análises - {{ $analise->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center">
    <h4>{{ $analise->nome }}</h4><hr></div>

    @if ($analise->tipo == 'Categórica Ordinal')
        <div class="text-center row">
            <div class="d-grid gap-4 d-md-flex justify-content-md-center">
                <a href="{{ route('varCategoricas.index', ['analise' => $analise->id]) }}">
                    <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-ruled" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1zm9 6H6v2h7zm0 3H6v2h7zm0 3H6v2h6a1 1 0 0 0 1-1zm-8 2v-2H3v1a1 1 0 0 0 1 1zm-2-3h2v-2H3zm0-3h2V7H3z"/>
                          </svg>
                Categorias
            </div>  
            </a>
        </div>
        </div>
    @endif

    <form action=" {{ route('analises.update', ['analise' => $analise->id]) }} " method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row mx-2 w-auto">
            <div class="col-8">
                <label class="form-label" for='nome'>Nome: </label>
                <input class="form-control" placeholder="Nome"  type="text" id="nome" name="nome" value="{{ $analise->nome }}">
            </div>
            <div class="col-4">
            <label class="form-label" for='tipo'>Forma: </label>
            <select class="form-select" id="tipo" name="tipo">
                    <option value="Numérica Discreta" {{$analise->tipo == 'Numérica Discreta"' ? 'selected' : '' }}>Numérica Discreta</option>
                    <option value="Numérica Contínua" {{$analise->tipo == 'Numérica Contínua' ? 'selected' : '' }}>Numérica Contínua</option>
                    <option value="Categórica Nominal" {{$analise->tipo == 'Categórica Nominal' ? 'selected' : '' }}>Categórica Nominal</option>
                    <option value="Categórica Ordinal" {{$analise->tipo == 'Categórica Ordinal' ? 'selected' : '' }}>Categórica Ordinal</option>
            </select>
            </div>
        </div>
        <div class="row mx-2 w-auto">
            <div class="col-2">
            <label class="form-label" for='unidade'>Unidade: </label>
            <input class="form-control" placeholder="Unidade"  type="text" id="unidade" name="unidade" value="{{ $analise->unidade }}">
            </div>
            <div class="col-2">
            <label class="form-label" for='margem'>Margem Permitida: </label>
            <input class="form-control" placeholder="Margem Permitida"  type="text" id="margem" name="margem" value="{{ $analise->margem }}">
            </div>
            <div class="col-2">
            <label class="form-label" for='valor_ar'>Valor_AR: </label>
            <input class="form-control" placeholder="Valor AR"  type="number" id="valor_ar" name="valor_ar" value="{{ $analise->valor_ar }}">
            </div>
            <div class="col-6">
            <label class="form-label" for='tipo'>Tipo: </label>
            <select class="form-select" id="tipo_id" name="tipo_id">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo['id'] }}" {{$analise->tipo_mp->nome == $tipo['id'] ? 'selected' : '' }}>{{ $tipo['nome'] }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="text-start ms-4 my-4">
            <h5> Observações</h5>
    </div>
        <table class="table table-striped table-hover m-2 align-middle">
            <thead>
                <tr>
                    <th style="width: 30%">Nome</th>
                    <th style="width: 60%">Observação</th>
                    <th style="width: 10%"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($obs as $ob)
                <tr>
                    <td>{{ $ob->nome}}</td>
                    <td>{{ $ob->observacao}}</td>
                    <td><a href=" {{ route('analises.delObs', ['analise' => $analise->id, 'observacao' => $ob->id]) }} " class="list"> Excluir </a></td>
                </tr>
                @endforeach
                <hr>
            </tbody>
        </table>   
        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-3">
            <button type="button" class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" data-bs-toggle="modal" data-bs-target="#modalObs{{$analise->id}}">
                Adicionar Nova Observação
            </button>
        </div>
<hr>
        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('analises.index', ['$tipo_id' => '0']) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>  
        </a>
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
        </button>
        </form>
        <form action=" {{ route('analises.destroy', ['analise' => $analise->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
                <i class="material-icons">delete</i>  Apagar
            </button>
        </form>
    </div>
<br>

<div class="modal fade modal-xl" id="modalObs{{$analise->id}}" tabindex="-1" aria-labelledby="modalObs" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Observações</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <table class="table table-striped table-hover m-2 align-middle">
                    <thead>
                        <tr>
                            <th style="width: 20%">Nome</th>
                            <th style="width: 60%">Observação</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            if (isset($obs)) {
                              $obs = $obs->pluck('id')->toArray();
                            } else {
                              $obs = [];
                            }
                            $observacaos = Observacao::where('tipo', 'Método Analítico')->whereNotIn('id',(array)$obs)->get();
                        @endphp
                        @foreach ($observacaos as $observacao)
                        <tr>
                            <td>{{ $observacao->nome }}</td>
                            <td>{{ $observacao->observacao }}</td>
                            <td><a href=" {{ route('analises.addObs', ['analise' => $analise->id, 'observacao' => $observacao->id]) }} " class="list"> Adicionar </a></td>
                        </tr>
        
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
    </div>
</div>
@endsection
