@extends('layouts.app')

@section('titulo')
Fornecedores
@endsection

@section('conteudo')
<br>
    <div class="text-center">
        <h4>Fornecedores</h4><hr>
    </div>
        <table class="table table-striped table-hover m-2">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>CNPJ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($fornecedors as $fornecedor)
                <tr>
                    <td style="width: 45%">{{ $fornecedor->nome }}</td>
                    <td style="width: 20%">{{ $fornecedor->telefone }}</td>
                    <td style="width: 10%">{{ $fornecedor->cep }}</td>
                    <td style="width: 15%">{{ $fornecedor->cnpj }}</td>
                    <td style="width: 10%"><a href=" {{ route('fornecedors.show', ['fornecedor' => $fornecedor->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

{{ $fornecedors->links('includes.pagination') }}
    <br>
<div class="d-grid gap-1 d-md-flex justify-content-md-center">
    <a class="btn btn-primary icon-link shadow text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" href="{{ route('fornecedors.create') }}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
          </svg>
                        Novo Registro
    </a>
</div>
<br>
@endsection
