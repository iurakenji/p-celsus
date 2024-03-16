@extends('layouts.app')

@section('titulo')
Riscos de Matérias-Primas
@endsection

@section('conteudo')
<br>

    <div class="text-center">
        <h4 class="mb-3">{{ $mp->nome }}</h4>
    </div>

    <div class="row w-100">
        <x-mps.lotes :mp="$mp->id" />
        <x-mps.observacoes :mp="$mp->id" />
        <x-mps.infos :mp="$mp->id" />
        <x-mps.setores :mp="$mp->id" />
        </div>
        <table class="table table-striped table-hover m-2 align-middle">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($riscos as $risco)
                <tr>
                    <td style="width: 10%"> <img src=" {{ asset($risco->imagem) }} " alt=" {{ $risco->nome }} " style="width: 50% "> </td>
                    <td style="width: 20%">{{ $risco->nome }}</td>
                    <td style="width: 50%">{{ $risco->descricao }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.risco_create', ['mp' => $mp->id, 'id' => $risco->id]) }} " class="list"> Adicionar </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>



{{ $riscos->links('includes.pagination') }}

<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ route('mps.risco_index', ['mp' => $mp]) }}">
        <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
        <i class="material-icons">arrow_back</i>
        Voltar  
        </div>  
    </a>
    <a href="{{ route('observacaos.create') }}">
        <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
              </svg>
              Novo Registro
        </div>  
    </a>
</div>


@endsection
