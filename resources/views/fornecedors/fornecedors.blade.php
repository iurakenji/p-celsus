@extends('layouts.app')

@section('titulo')
Fornecedores
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Fornecedores</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>CNPJ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
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

    <div class="row center">

{{ $fornecedors->links('includes.pagination') }}

    </div>

    <a href="{{ route('fornecedors.create') }}">
        <div class="row">
            <div class="col s12 m3 right">
                <div class="waves-effect waves-light btn indigo darken-3 hoverable center-align white-text container">
                        <i class="material-icons">add</i>
                        Novo Registro
                </div>
            </div>
        </div>
    </a>
@endsection
