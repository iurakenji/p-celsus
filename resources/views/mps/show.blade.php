@extends('layouts.app')

@section('titulo')
Matérias-Primas - {{ $mp->nome }}
@endsection

@php
    use App\Models\Tipo;
    use App\Models\Fornecedor;
    use App\Models\GrupoDescarte;

    $tipos = Tipo::all('id', 'nome');
    $fornecedors = Fornecedor::all('id', 'nome');
    $grupodescartes = GrupoDescarte::all('id', 'nome');
@endphp

@section('conteudo')
<br>
<div class="text-center">

    <h4 class="mb-3">{{ $mp->nome }}</h4>
</div>


<div class="row w-100">
<x-mps.lotes :mp="$mp->id" />
<x-mps.observacoes :mp="$mp->id" />
<x-mps.riscos :mp="$mp->id" />
<x-mps.setores :mp="$mp->id" />
</div>

<h4 class="text-center mt-3">Informações Básicas</h4>

    <form action=" {{ route('mps.update', ['mp' => $mp->id]) }} " method="post" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row mx-1 w-95">
            <div class="col-2">
                <label class="form-label" for='codigo'>Código: </label>
                <input class="form-control" type="text" id="codigo" name="codigo" value="{{ $mp->codigo }}">
            </div>
            <div class="col-6">
            <label class="form-label" for='nome' title='Nome'>Nome: </label>
            <input class="form-control" type="text" id="nome" name="nome" value="{{ $mp->nome }}">
            </div>
            <div class="col-4">
                <label class="form-label" for='nome_fc'>Nome Alternativo / Fórmula Certa: </label>
                <input class="form-control" type="text" id="nome_fc" name="nome_fc" value="{{ $mp->nome_fc }}">
            </div>
        <div class="row mx-1">
            <div class="col-3">
                <label class="form-label" for='forma'>Forma: </label>
                <select class="form-select" id="forma" name="forma">
                        <option value="Sólido" {{$mp->forma == 'Sólido' ? 'selected' : '' }}>Sólido</option>
                        <option value="Líquido" {{$mp->forma == 'Líquido' ? 'selected' : '' }}>Líquido</option>
                        <option value="Semi-Sólido" {{$mp->forma == 'Semi-Sólido' ? 'selected' : '' }}>Semi-Sólido</option>
                        <option value="Semi-Acabado" {{$mp->forma == 'Semi-Acabado' ? 'selected' : '' }}>Semi-Acabado</option>
                        <option value="Produto Final" {{$mp->forma == 'Produto Final' ? 'selected' : '' }}>Produto Final</option>
                        <option value="Outros" {{$mp->forma == 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>
            <div class="col-3">
                <label class="form-label" for='tipo_id'>Tipo: </label>
                <select class="form-select" id="tipo_id" name="tipo_id">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo['id'] }}" {{$mp->tipo->nome == $tipo['id'] ? 'selected' : '' }}>{{ $tipo['nome'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label class="form-label" for='cas'>CAS: </label>
                <input class="form-control" type="text" id="cas" name="cas" value="{{ $mp->cas }}">
            </div>
            <div class="col-2">
                <label class="form-label" for='dci'>DCI: </label>
                <input class="form-control" type="text" id="dci" name="dci" value="{{ $mp->dci }}">
            </div>
            <div class="col-2">
                <label class="form-label" for='dcb'>DCB: </label>
                <input class="form-control" type="text" id="dcb" name="dcb" value="{{ $mp->dcb }}">
            </div>
        </div>
        <div class="row mx-1">
            <div class="col-2 mt-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="mp_vegetal" name="mp_vegetal" value="1" @checked(old('mp_vegetal', $mp->mp_vegetal)) />
                    <label class="form-check-label" for="mp_vegetal">Matéria-Prima Vegetal</label>    
                </div>
            </div>
            <div class="input-field col s3">
                <label class="form-label" for='parte_usada'>Parte Usada: </label>
                <input class="form-control" type="text" id="parte_usada" name="parte_usada" value="{{ $mp->parte_usada }}">
            </div>
            <div class="input-field col s8">
                <label class="form-label" for='nome_popular'>Outros Nomes (científico / popular / etc.): </label>
                <input class="form-control" type="text" id="nome_popular" name="nome_popular" value="{{ $mp->nome_popular }}">
            </div>
        </div>
        <div class="row mx-1">
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bancada" name="bancada" value="1" @checked(old('bancada', $mp->bancada)) />
                    <label class="form-check-label" for="bancada">MP de Bancada</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tratado" name="tratado" value="1" @checked(old('tratado', $mp->tratado)) />
                    <label class="form-check-label" for="tratado">Matéria-Prima Tratada</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="producao" name="producao" value="1" @checked(old('producao', $mp->producao)) />
                    <label class="form-check-label" for="producao">Produção</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="citostatico" name="citostatico" value="1" @checked(old('citostatico', $mp->citostatico)) />
                    <label class="form-check-label" for="citostatico">Citostático</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hormonio" name="hormonio" value="1" @checked(old('hormonio', $mp->hormonio)) />
                    <label class="form-check-label" for="hormonio">Hormônio</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="enzima" name="enzima" value="1" @checked(old('enzima', $mp->enzima)) />
                    <label class="form-check-label" for="enzima">Enzima</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lacto" name="lacto" value="1" @checked(old('lacto', $mp->lacto)) />
                    <label class="form-check-label" for="lacto">Lactobacilo / Probiótico</label>
                </div>
            </div>
            <div class="col-3">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tintura" name="tintura" value="1" @checked(old('tintura', $mp->tintura)) />
                    <label class="form-check-label" for="tintura">Tintura / Extrato Glicólico</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="micronizado" name="micronizado" value="1" @checked(old('micronizado', $mp->micronizado)) />
                    <label class="form-check-label" for="micronizado">Micronizado</label>
                </div>
            </div>
        </div>

        <div class="row mx-5 align-middle">
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="patenteado" name="patenteado" value="1" @checked(old('patenteado', $mp->patenteado)) />
                    <label class="form-check-label" for="patenteado">Patenteado</label>
                </div>
            </div>
            <div class="col-4 mt-3">
                <label class="form-label" for='tipo'>Fornecedor: </label>
                <select class="form-select" id="fornecedor" name="fornecedor">
                    @if ($mp->fornecedor_id == null)
                        @foreach ($fornecedors as $fornecedor)
                            <option value={{ $fornecedor['id'] }} >{{ $fornecedor['nome'] }}</option>
                        @endforeach
                    @else
                        @foreach ($fornecedors as $fornecedor)
                            <option value="{{ $mp->fornecedor->nome }}" {{$mp->fornecedor_id == $fornecedor['id'] ? 'selected' : '' }}>{{ $fornecedor['nome'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-4 mt-3 offset-md-1">
                <label class="form-label" for='grupodescarte'>Grupo de Descarte: </label>
                <select class="form-select" id="grupodescarte" name="grupodescarte">
                    @if ($mp->grupodescarte_id == null)
                        @foreach ($grupodescartes as $grupodescarte)
                            <option value={{ $grupodescarte['id'] }} >{{ $grupodescarte['nome'] }}</option>
                        @endforeach
                    @else
                        @foreach ($grupodescartes as $grupodescarte)
                            <option value="{{ $mp->grupodescarte->nome }}" {{$mp->grupodescarte_id == $grupodescarte['id'] ? 'selected' : '' }}>{{ $grupodescarte['nome'] }}</option>
                        @endforeach
                    @endif
                    </select>
            </div>
        </div>
        
        <div class="row mx-1 mt-0">
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="p344" name="p344" value="1" @checked(old('p344', $mp->p344)) />
                    <label class="form-check-label" for="p344">Contr. Port. 344</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pf" name="pf" value="1" @checked(old('pf', $mp->pf)) />
                    <label class="form-check-label" for="pf">Contr. PF</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pc" name="pc" value="1" @checked(old('pc', $mp->pc)) />
                    <label class="form-check-label" for="pc">Contr. PC</label>
                </div>
            </div>
            <div class="col-2">
                <legend class="col-form-label">‎ </legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ex" name="ex" value="1" @checked(old('ex', $mp->ex)) />
                    <label class="form-check-label" for="ex">Contr. Exército</label>
                </div>
            </div>
        </div><p></p>
<br>
        <div class="d-grid gap-4 d-md-flex justify-content-md-center">
            <a href="{{ route('mps.index') }}">
                <div class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <i class="material-icons">arrow_back</i>
                Voltar
                </div>  
            </a>
            <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Salvar">
            <i class="material-icons">save</i>  Salvar
            </button>
    </form>
            <form action=" {{ route('mps.destroy', ['mp' => $mp->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Apagar">
                <i class="material-icons">delete</i>  Apagar
                </button>
            </form>
        </div>

@endsection
