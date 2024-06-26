@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')
<div class="text-center">
       <br> <h4>Tipos de Acesso</h4>
</div><hr>

    <div class="col">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($tipo_acessos as $tipo_acesso)
                <tr>
                    <td class="align-middle text-left" style="width: 35%">{{ $tipo_acesso->nome }}</td>
                    <td class="align-middle text-left" style="width: 55%">{{ $tipo_acesso->descricao }}</td>
                    <td class="align-middle text-center" style="width: 10%"><a href=" {{ route('tipo_acessos.show', ['tipo_acesso' => $tipo_acesso->id]) }} " class="list"> Detalhes </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<div>
{{ $tipo_acessos->links('includes.pagination') }}
</div>
<br>

<div class="d-grid gap-1 d-md-flex justify-content-md-center">
    <a class="btn btn-primary icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" href="{{ route('tipo_acessos.create') }}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
          </svg>
                        Novo Registro
    </a>
</div>
@endsection
