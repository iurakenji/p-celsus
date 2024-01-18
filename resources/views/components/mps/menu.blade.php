//adicionar essa tag na view
<x-mps.menu :mp="$mp->id" />

@props(['mp'])

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
    <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('mps.obs_index', ['mp' => $mp]) }}">
        <i class="small material-icons">speaker_notes</i>
        <span>
        Observações
        </span>
</a>
</div>
</div>
