@extends('layouts.app')

@section('titulo')
Lotes: Selecionar Matéria-Prima
@endsection

@section('conteudo')

<div class="row mx-3  align-items-center w-auto">
    <div class="col-10">
        <form action=" {{ route('loteFisicos.query', ['origem' => '2']) }} " method="post" >
            @csrf
        <div class="input-field">
            <label class="col-form-label" for='codigo'>Pesquisar: </label>
            <input class="form-control" type="text" id="chave" name="chave">
        </div>
    </div>
    <div class="col text-center mt-4">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle 
    border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
        <i class="material-icons">search</i>  Pesquisar
    </button>
    </div>
</form>
</div>
<hr>
    <div class="text-center">
        <h4>Chegada de Lotes: Selecionar Matéria-Prima</h4>
    </div>
        <table class="table table-striped table-hover m-2 w-auto">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Forma</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($mps as $mp)
                <tr>
                    <td style="width: 10%">{{ $mp->codigo }}</td>
                    <td style="width: 50%">{{ $mp->nome }}</td>
                    <td style="width: 20%">{{ $mp->tipo->nome }}</td>
                    <td style="width: 15%">{{ $mp->forma }}</td>
                    <td style="width: 20%"><a href=" {{ route('loteFisicos.create', ['mp' => $mp->id]) }} " class="list"> Selecionar</a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

{{ $mps->links('includes.pagination') }}
<hr>
<div class="col text-center mt-4">
    <a href="{{ route('loteFisicos.index') }}">
    <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
        <i class="material-icons">arrow_back</i>
    Voltar
    </button>
</a>
</div><br>
@endsection
