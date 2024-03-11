@extends('layouts.app')

@php
    
    use App\Models\Observacao;
    use Illuminate\Support\Carbon;
    
    $observacaos_mp = DB::table('mp_observacao')->join('observacaos', 'mp_observacao.observacao_id', '=', 'observacaos.id')->where('mp_id',$mp->id)->get();
    $observacaos_lote = DB::table('lote_observacao')->join('observacaos', 'lote_observacao.observacao_id', '=', 'observacaos.id')->where('lote_id',$lote->id)->get();
    foreach ($observacaos_lote as $observacao_lote) {
        $observacaos_mp->merge($observacao_lote);
    }
    dd($observacaos_mp);
@endphp

@section('titulo')
Visualização de Laudo - {{ $lote->mp->nome }}
@endsection

@section('conteudo')
<br>
<div class="text-center mb-4">
        <h4>{{$mp->codigo.' - '.$mp->nome }}  </h4>
</div><hr>
<div class="text-start ms-4 my-4">
    <h5>  4. Visualização do Laudo  </h5>
</div>
<page size="A4"></page>

<div class="container shadow" style="height: 300vh">
   
    
    
    <div class="row text-center pt-5 px-5">
            <div class="col pt-3 border border-black"><img class="img-fluid" src=" {{asset("storage\img\Logo.png")}}" alt=" logo " style="width: 100% "></div>
            <div class="col-8 pt-5 border border-black border-start-0"><h5>Certificado de Análise de Matéria-Prima <br>no Controle de Qualidade</h5></div>
            <div class="col py-4 border border-black border-start-0">FOR 003 <br>REV 01 <br><h5><b>CERT {{$lote->certificado}}</b></h5></div>
    </div>
    <div class="row px-5">
        <div class="col-6 border border-black border-top-0"><b>Insumo:</b> {{$mp->nome}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>CAS:</b> {{$mp->cas}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>DCI / DCB:</b> {{$mp->dci}} / {{$mp->dcb}}</div>
    </div>
    <div class="row px-5">
        <div class="col-8 border border-black border-top-0"><b>Lote do Fornecedor:</b> {{$lote->lote}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>NF:</b> {{$lote->nf}}</div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0"><b>Código do Produto (interno):</b> {{$mp->codigo}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>Fornecedor:</b> {{$lote->fornecedor->nome}}</div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0"><b>Data de Fabricação:</b> {{$lote->fabricacao->format('d-m-Y')}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>Data de Validade:</b> {{$lote->validade->format('d-m-Y')}}</div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0"><b>Amostragem para o CQ:</b> {{$lote->amostra_cq}}</div>
        <div class="col border border-black border-top-0 border-start-0"><b>Origem:</b> {{$lote->origem}}</div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0"><b>Armazenamento:</b> {{$lote->armazenamento->nome}}</div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0"><b>Peso / volume:</b> {{$lote->quantidade}}g</div>
        <div class="col border border-black border-top-0 border-start-0"><b>Periodicidade:</b> </div>
    </div>
    @if ($mp->mp_vegetal == true)
        <div class="row px-5">
            <div class="col-7 align-text-top border border-black border-top-0"><b>Nome Popular / Científico:</b> {{$mp->nome_popular}}</div>
            <div class="col align-text-top border border-black border-top-0 border-start-0"><b>Parte Usada:</b> {{$mp->parte_usada}}</div>
        </div>
    @endif
    <div class="row px-5">
        <div class="col py-2 text-center border border-black border-top-0"><b>Avaliação do Laudo do Fornecedor: </b> <span class="me-3">(&nbsp;&nbsp;&nbsp;&nbsp;)  Conforme </span>(&nbsp;&nbsp;&nbsp;&nbsp;) Não Conforme</div>
    </div>
    <div class="row px-5">
        <div class="col py-3 text-center border border-black border-top-0"><b>Análises</b> </div>
    </div>
    <div class="row px-5">
        <div class="col text-center border border-black border-top-0"><b>Análise</b> </div>
        <div class="col text-center border border-black border-start-0 border-top-0"><b>Especificação</b> </div>
        <div class="col text-center border border-black border-start-0 border-top-0"><b>Resultado</b> </div>
        <div class="col text-center border border-black border-start-0 border-top-0"><b>Referência</b> </div>
    </div>
        @foreach ($lote->analises()->get() as $analise)
        <div class="row px-5">
            <div class="col text-center border border-black border-top-0 py-3">{{$analise->nome}} </div>
            @if ($analise->tipo == 'Categórica Nominal')
                <div class="col text-center border border-black border-start-0 border-top-0 py-3">{{$analise->pivot->especificacao}} </div>
            @endif
            @if ($analise->tipo == 'Categórica Ordinal')
                <div class="col text-center border border-black border-start-0 border-top-0 py-3">De {{DB::table('var_categoricas')->where('ordem',$analise->pivot->lim_inf)->value('nome')}} a {{DB::table('var_categoricas')->where('ordem',$analise->pivot->lim_sup)->value('nome')}} </div>
            @endif
            @if (($analise->tipo == 'Numérica Contínua') || ($analise->tipo == 'Numérica Ordinal'))
                <div class="col text-center border border-black border-start-0 border-top-0 py-3">De {{$analise->pivot->lim_inf}}{{$analise->unidade}} até {{$analise->pivot->lim_sup}}{{$analise->unidade}} </div>
            @endif
            <div class="col text-center border border-black border-start-0 border-top-0 py-3"></div>
            <div class="col text-center border border-black border-start-0 border-top-0 py-3">{{DB::table('referencias')->find($analise->pivot->referencia_id)->nome}} </div>
        </div>
        @endforeach
    <div class="row px-5">
        <div class="col py-2 border border-black border-top-0"></div>
    </div>
    <div class="row px-5">
        <div class="col py-2 text-center border border-black border-top-0"><b>Aprovado: </b> <span class="me-3">(&nbsp;&nbsp;&nbsp;&nbsp;)  Sim </span>(&nbsp;&nbsp;&nbsp;&nbsp;) Não</div>
    </div>
    <div class="row px-5">
        <div class="col-9 border border-black border-top-0 py-2"><b>Analisado por:</b></div>
        <div class="col border border-black border-top-0 border-start-0 py-2"><b>Data:</b> </div>
    </div>
    <div class="row px-5">
        <div class="col-9 border border-black border-top-0 py-2"><b>Aprovado por:</b></div>
        <div class="col border border-black border-top-0 border-start-0 py-2"><b>Data:</b> </div>
    </div>
    <div class="row px-5">
        <div class="col-9 border border-black border-top-0 py-2"><b>Liberado por:</b></div>
        <div class="col border border-black border-top-0 border-start-0 py-2"><b>Data:</b> </div>
    </div>
    <div class="row px-5">
        <div class="col border border-black border-top-0 py-2"><b>Obs:</b>
            @foreach ($lote->analises()->get() as $analise)
                
            @endforeach
            @foreach ($observacaos as $observacao)
            @php
                $observacaos_analise = DB::table('analise_observacao')->join('observacaos', 'analise_observacao.observacao_id', '=', 'observacaos.id')->where('analise_id',$analise->id)->get();
            @endphp
                    {{$observacao->observacao}}
                @endforeach
        </div>
    </div>
    

</div>

<hr>

        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-3">
            <a href="{{ route('lotes.conferencia_show_3', ['mp' => $mp->id, 'lote' => $lote->id]) }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <a href="{{ route('lotes.conferencia_show_5', ['mp' => $mp->id, 'lote' => $lote->id]) }}">
            <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                Próximo  <i class="material-icons">arrow_forward</i>
            </div>
          </a>
        </div>

        <br>
@endsection
