@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')
<br>
    <div class="text-center">
        <h4>Usuários</h4><hr>
    </div>
        <table class="table table-striped table-hover m-2">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Título</th>
                    <th>Tipo de Acesso</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($usuarios as $usuario)
                <tr>
                    <td class="align-middle text-left">{{ $usuario->login }} </a></li>
                    <td class="align-middle text-left">{{ $usuario->nome }} </a></li>
                    <td class="align-middle text-left">{{ $usuario->titulo }} </a></li>
                    <td class="align-middle text-left">{{ $usuario->tipo_acesso->nome }} </a></li>
                    <td class="align-middle text-center"><a href=" {{ route('usuarios.show', ['usuario' => $usuario->id]) }} " class="list"> Detalhes </a></li>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

{{ $usuarios->links('includes.pagination') }}
<br>
<div class="d-grid gap-1 d-md-flex justify-content-md-center">
    <a class="btn btn-primary icon-link shadow text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" href="{{ route('usuarios.create') }}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
          </svg>
                        Novo Registro
    </a>
</div>
<br>

    
@endsection
