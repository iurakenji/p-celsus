@extends('layouts.app')

@section('titulo')
Matérias-Primas
@endsection

@section('conteudo')

<x-mps.query/>
<hr>
    <div class="text-center">
        <h4>Matérias-Primas</h4>
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
                    <td style="width: 20%"><a href=" {{ route('lotes.index', ['mp' => $mp->id]) }} " class="list"> Visualizar</a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

{{ $mps->links('includes.pagination') }}

@endsection
