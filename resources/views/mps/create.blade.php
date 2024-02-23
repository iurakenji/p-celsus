@extends('layouts.app')



@section('titulo')
Matéria-Prima - Novo Registro
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

<div class="row center" style="margin: 0px 20px ">
    <h5>Novo Registro</h5><br>
</div>

<div class="row justify-content-center">
    <x-mps.lotes :mp="$mp->id" />
    <x-mps.observacoes :mp="$mp->id" />
    <x-mps.riscos :mp="$mp->id" />
    <x-mps.setores :mp="$mp->id" />
    </div>

    <form action=" {{ route('mps.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="input-field col s2">
                <input type="text" id="codigo" name="codigo">
                <label for='codigo'>Código: </label>
            </div>
            <div class="input-field col s10">
            <label for='nome' title='Nome'>Nome: </label>
            <input type="text" id="nome" name="nome">
            </div>
            <div class="input-field col s12">
                <input type="text" id="nome_fc" name="nome_fc">
                <label for='nome_fc'>Nome Alternativo / Fórmula Certa: </label>
            </div>

            <div class="input-field col s1">
                <label for='tipo'>Forma: </label>
                </div>
            <div class="input-field col s5">
                <select class="browser-default" id="forma" name="forma">
                        <option value="Sólido">Sólido</option>
                        <option value="Líquido">Líquido</option>
                        <option value="Semi-Sólido">Semi-Sólido</option>
                        <option value="Semi-Acabado">Semi-Acabado</option>
                        <option value="Produto Final">Produto Final</option>
                        <option value="Outros">Outros</option>
                </select>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Tipo: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="tipo_id" name="tipo_id">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo['id'] }}">{{ $tipo['nome'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field col s4">
                <input type="text" id="cas" name="cas">
                <label for='cas'>CAS: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dci" name="dci">
                <label for='dci'>DCI: </label>
            </div>
            <div class="input-field col s4">
                <input type="text" id="dcb" name="dcb">
                <label for='dcb'>DCB: </label>
            </div>

            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="mp_vegetal" name="mp_vegetal" value="0" />
                <span>Matéria-Prima Vegetal</span>
                </label>
            </div>
            <div class="input-field col s2">
                <input type="text" id="parte_usada" name="parte_usada">
                <label for='parte_usada'>Parte Usada: </label>
            </div>
            <div class="input-field col s8">
                <input type="text" id="nome_popular" name="nome_popular">
                <label for='nome_popular'>Outros Nomes (científico / popular / etc.): </label>
            </div>

            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="bancada" name="bancada" value="0"/>
                <span>MP de Bancada</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="tratado" name="tratado" value="0"/>
                <span>Matéria-Prima Tratada</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="producao" name="producao" value="0"/>
                <span>Produção</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="citostatico" name="citostatico" value="0"/>
                <span>Citostático</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="hormonio" name="hormonio" value="0"/>
                <span>Hormônio</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="enzima" name="enzima" value="0"/>
                <span>Enzima</span>
                </label>
            </div>

            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="lacto" name="lacto" value="0"/>
                <span>Lactobacilo / Probiótico</span>
                </label>
            </div>
            <div class="input-field col s2">
                <label>
                <input type="checkbox" id="tintura" name="tintura" value="0"/>
                <span>Tintura / Extrato Glicólico</span>
                </label>
            </div>
            <div class="input-field col s8">
                <label>
                <input type="checkbox" id="micronizado" name="micronizado" value="0"/>
                <span>Micronizado</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="patenteado" name="patenteado" value="0"/>
                <span>Patenteado</span>
                </label>
            </div>
            <div class="input-field col s1">
                <label for='tipo'>Fornecedor: </label>
            </div>
            <div class="input-field col s5">
                <select class="browser-default" id="fornecedor" name="fornecedor">
                        @foreach ($fornecedors as $fornecedor)
                            <option value={{ $fornecedor['id'] }} >{{ $fornecedor['nome'] }}</option>
                        @endforeach
                    </select>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="p344" name="p344" value="0" />
                <span>Contr. Port. 344</span>
                </label>
            </div>
            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="pf" name="pf" value="0" />
                <span>Contr. PF</span>
                </label>
            </div>

            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="pc" name="pc" value="0" />
                <span>Contr. PC</span>
                </label>
            </div>
            <div class="input-field col s1">
                <label>
                <input type="checkbox" id="ex" name="ex" value="0" />
                <span>Contr. Exército</span>
                </label>
            </div>

            <div class="input-field offset-s3 col s1">
                <label for='tipo'>Grupo de Descarte: </label>
            </div>
            <div class="input-field col s4">
                <select class="browser-default" id="grupodescarte" name="grupodescarte">
                    @foreach ($grupodescartes as $grupodescarte)
                        <option value={{ $grupodescarte['id'] }} >{{ $grupodescarte['nome'] }}</option>
                    @endforeach
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
@endsection
