@extends('layouts.app')

@section('titulo')
Matérias-Primas
@endsection

@section('conteudo')

<div class="row mx-3  align-items-center w-auto">
    <div class="col-10">
        <form action=" {{ route('mps.query') }} " method="post" >
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
        <h4>Matérias-Primas</h4>
    </div>
        <table class="table table-striped table-hover m-2 w-auto align-middle">
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
                    <td style="width: 20%"><a href=" {{ route('mps.show', ['mp' => $mp->id]) }} " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">

{{ $mps->links('includes.pagination') }}
    </div>
@endsection
