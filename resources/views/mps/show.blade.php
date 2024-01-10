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
<div class="row">

</div>
<div class="row center">

    <h5>{{ $mp->nome }}</h5><br>
</div>
<div class="row">
    <div class="valign-wrapper center">
        <a class=" white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('fracionamentos.index') }}">
            <i class="small material-icons">view_list</i>
            <span>
            Análises
            </span>
        </a>
    <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('fracionamentos.index') }}">
            <i class="small material-icons">apps</i>
            <span>
            Setores
            </span>
    </a>
    <a class="white-text btn col m3 center-align blue-grey darken-4 hoverable" href="{{ route('fracionamentos.index') }}">
            <i class="small material-icons">error_outline</i>
            <span>
            Riscos
            </span>
    </a>
    <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('fracionamentos.index') }}">
        <i class="small material-icons">speaker_notes</i>
        <span>
        Observações
        </span>
</a>
</div>
</div>

    <form action=" {{ route('mps.update', ['mp' => $mp->id]) }} " method="post"  style="margin: 0px 20px" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="input-field col s2">
                <input type="text" id="codigo" name="codigo" value="{{ $mp->codigo }}">
                <label for='codigo'>Código: </label>
            </div>
            <div class="input-field col s10">
            <label for='nome' title='Nome'>Nome: </label>
            <input type="text" id="nome" name="nome" value="{{ $mp->nome }}">
            </div>
            <div class="input-field col s12">
                <input type="text" id="nome_fc" name="nome_fc" value="{{ $mp->nome_fc }}">
                <label for='nome_fc'>Nome Alternativo / Fórmula Certa: </label>
            </div>

            <div class="input-field col s1">
                <label for='tipo'>Forma: </label>
                </div>
            <div class="input-field col s5">
                <select class="browser-default" id="forma" name="forma">
                        <option value="Sólido" {{$mp->forma == 'Sólido' ? 'selected' : '' }}>Sólido</option>
                        <option value="Líquido" {{$mp->forma == 'Líquido' ? 'selected' : '' }}>Líquido</option>
                        <option value="Semi-Sólido" {{$mp->forma == 'Semi-Sólido' ? 'selected' : '' }}>Semi-Sólido</option>
                        <option value="Semi-Acabado" {{$mp->forma == 'Semi-Acabado' ? 'selected' : '' }}>Semi-Acabado</option>
                        <option value="Produto Final" {{$mp->forma == 'Produto Final' ? 'selected' : '' }}>Produto Final</option>
                        <option value="Outros" {{$mp->forma == 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Tipo: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="tipo_id" name="tipo_id">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo['id'] }}" {{$mp->tipo->nome == $tipo['id'] ? 'selected' : '' }}>{{ $tipo['nome'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field col s4">
                <input type="text" id="cas" name="cas" value="{{ $mp->cas }}">
                <label for='cas'>CAS: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dci" name="dci" value="{{ $mp->dci }}">
                <label for='dci'>DCI: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dcb" name="dcb" value="{{ $mp->dcb }}">
                <label for='dcb'>DCB: </label>
            </div>

            <div class="input-field col s2">
                <label for="mp_vegetal">
                <input type="checkbox" id="mp_vegetal" name="mp_vegetal" value="1" @checked(old('mp_vegetal', $mp->mp_vegetal)) />
                <span>Matéria-Prima Vegetal</span>
                </label>
            </div>
            <div class="input-field col s2">
                <input type="text" id="parte_usada" name="parte_usada" value="{{ $mp->parte_usada }}">
                <label for='parte_usada'>Parte Usada: </label>
            </div>
            <div class="input-field col s8">
                <input type="text" id="nome_popular" name="nome_popular" value="{{ $mp->nome_popular }}">
                <label for='nome_popular'>Outros Nomes (científico / popular / etc.): </label>
            </div>

            <div class="input-field col s2">
                <label for="bancada">
                <input type="checkbox" id="bancada" name="bancada" value="1" @checked(old('bancada', $mp->bancada)) />
                <span>MP de Bancada</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="tratado" name="tratado" value="1" @checked(old('tratado', $mp->tratado)) />
                <span>Matéria-Prima Tratada</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="producao" name="producao" value="1" @checked(old('producao', $mp->producao)) />
                <span>Produção</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="citostatico" name="citostatico" value="1" @checked(old('citostatico', $mp->citostatico)) />
                <span>Citostático</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="hormonio" name="hormonio" value="1" @checked(old('hormonio', $mp->hormonio)) />
                <span>Hormônio</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="enzima" name="enzima" value="1" @checked(old('enzima', $mp->enzima)) />
                <span>Enzima</span>
                </label>
            </div>

            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="lacto" name="lacto" value="1" @checked(old('lacto', $mp->lacto)) />
                <span>Lactobacilo / Probiótico</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="tintura" name="tintura" value="1" @checked(old('tintura', $mp->tintura)) />
                <span>Tintura / Extrato Glicólico</span>
                </label>
            </div>
            <div class="input-field col s8">
                <label>
                <input type="checkbox" id="micronizado" name="micronizado" value="1" @checked(old('micronizado', $mp->micronizado)) />
                <span>Micronizado</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="patenteado" name="patenteado" value="1" @checked(old('patenteado', $mp->patenteado)) />
                <span>Patenteado</span>
                </label>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Fornecedor: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="fornecedor" name="fornecedor">
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

        </div>
        <div class="row">
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="p344" name="p344" value="1" @checked(old('p344', $mp->p344)) />
                <span>Contr. Port. 344</span>
                </label>
            </div>
            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="pf" name="pf" value="1" @checked(old('pf', $mp->pf)) />
                <span>Contr. PF</span>
                </label>
            </div>

            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="pc" name="pc" value="1" @checked(old('pc', $mp->pc)) />
                <span>Contr. PC</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="ex" name="ex" value="1" @checked(old('ex', $mp->ex)) />
                <span>Contr. Exército</span>
                </label>
            </div>

            <div class="input-field col s2">
                <label for='tipo'>Grupo de Descarte: </label>
            </div>
            <div class="input-field col s4">
                <select class="browser-default" id="grupodescarte" name="grupodescarte">
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

<div class="col s12 m2 left">
    <a href="{{ url()->previous() }}">
        <div class="waves-effect waves-light btn blue-grey darken-4
        hoverable center-align white-text valign-wrapper container">
            <i class="material-icons">arrow_back</i>
            Voltar
        </div>
    </a>
</div>
<div class="col s12 m2 right">
    <button class="waves-effect teal darken-4
    white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Salvar">
        <i class="material-icons">save</i>  Salvar
    </button>
</div>
</form>
<form action=" {{ route('mps.destroy', ['mp' => $mp->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="col s12 m2 right">
        <button class="waves-effect red lighten-1
        white-text btn waves-light hoverable btn container" type="submit" name="bt_entrar" value="Apagar">
            <i class="material-icons">delete</i>  Apagar
        </button>

    </div>
</form>
@endsection
