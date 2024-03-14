@extends('layouts.app')


@section('titulo')
Lotes
@endsection

@section('conteudo')
<br>
    <div class="text-center">
        <h4>{{ $mp->nome }} - Lotes</h4><hr>
    </div>
        <table class="table table-striped table-hover m-2 w-auto align-middle">
            <thead>
                <tr>
                    <th scope="col" style="width: 20%">Situação</th>
                    <th scope="col" style="width: 30%">Fornecedor</th>
                    <th scope="col" style="width: 10%">Data de Entrada</th>
                    <th scope="col" style="width: 20%">Lote</th>
                    <th scope="col" style="width: 10%">NF</th>
                    <th scope="col" style="width: 10%"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($lotes as $lote)
                    @php
                        switch ($lote->situacao) {
                            case 'Liberado':
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
                        <td><span style="color: {{ $cor }}">{{ $lote->situacao }}</span></td>
                        <td>{{ $lote->fornecedor->nome }}</td>
                        <td>{{ $lote->entrada }}</td>
                        <td>{{ $lote->lote }}</td>
                        <td>{{ $lote->nf }}</td>
                        <td><a href=" {{ route('lotes.show', ['mp' => $mp->id ,'lote' => $lote->id]) }} " class="list"> Detalhes </a></td>
                    </tr>                   
                @endforeach
            </tbody>
        </table>
    </div>

{{ $lotes->links('includes.pagination') }}

    <br>

    <div class="d-grid gap-4 d-md-flex justify-content-md-center">
        <a href="{{ route('lotes.mp_index') }}">
            <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <i class="material-icons">arrow_back</i>
            Voltar  
            </div>  
        </a>
        <a href="{{ route('lotes.create', ['mp' => $mp->id]) }}">
            <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                  </svg>
                  Novo Lote
            </div>  
        </a>
    </div>

@endsection
