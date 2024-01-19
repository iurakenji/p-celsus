
@props(['mp'])

    <a class="white-text btn col m3 blue-grey darken-4 hoverable" href="{{ route('mps.obs_index', ['mp' => $mp]) }}">
        <i class="small material-icons">speaker_notes</i>
        <span>
        Observações
        </span>
    </a>
