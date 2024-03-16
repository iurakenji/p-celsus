@extends('layouts.app')

@section('titulo')
Observações
@endsection

@section('conteudo')
<br>
    <div class="text-center">
        <h4 class="mb-3">{{ $mp->nome }}</h4>
    </div>



    <div class="row w-100">
        <x-mps.lotes :mp="$mp->id" />
        <x-mps.infos :mp="$mp->id" />
        <x-mps.riscos :mp="$mp->id" />
        <x-mps.setores :mp="$mp->id" />
        </div>


        <h4 class="text-center mt-3">Observações</h4><br>

        <table class="table table-striped table-hover m-2 align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Observação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($observacaos as $observacao)
                <tr>
                    <td style="width: 35%">{{ $observacao->nome }}</td>
                    <td style="width: 55%">{{ $observacao->observacao }}</td>
                    <td style="width: 10%"><a href=" {{ route('mps.obs_delete', ['mp' => $mp->id, 'id' => $observacao->id]) }} " class="list"> Excluir </a></td>
                </tr>
                @endforeach
    </tbody>
        </table>
    </div>

<br>

<div class="d-grid gap-4 d-md-flex justify-content-md-center">
    <a href="{{ route('mps.obs_show',  ['mp' => $mp->id] ) }}">
        <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
              </svg>
        Adicionar
        </div>  
    </a>
</div>
@endsection
