@extends('layouts.app')

@section('titulo')
Usuários
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Tipos de Acesso</h5><br>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_acessos as $tipo_acesso)
                <tr>
                    <td>{{ $tipo_acesso->nome }} </a></li>
                    <td>{{ $tipo_acesso->descricao }} </a></li>
                    <td><a href=" {{ route('tipo_acessos.show', ['tipo_acesso' => $tipo_acesso->id]) }} " class="list"> Detalhes </a></li>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $tipo_acessos->links('includes.pagination') }}

    </div>

@endsection
