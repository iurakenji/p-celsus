@extends('layouts.app')

@section('titulo')
Matéria-Primas: DB Antigo
@endsection

@section('conteudo')

    <div class="row center" style="margin: 0px 20px">
        <h5>Matéria-Primas: DB Antigo</h5><br>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td style="width: 30%">{{ $materia->codigo }}</td>
                    <td style="width: 60%">{{ $materia->nome }}</td>
                    <td style="width: 10%"><a href=" # " class="list"> Detalhes </a></td>
                </tr>

        @endforeach
    </tbody>
        </table>
    </div>

    <div class="row center">



    </div>
@endsection
