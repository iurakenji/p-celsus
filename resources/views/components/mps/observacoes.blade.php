
@props(['mp'])

    <a class="col-3 btn btn-primary shadow icon-link text-white bg-dark border border-black rounded-3" href="{{ route('mps.obs_index', ['mp' => $mp]) }}">
        <i class="small material-icons">speaker_notes</i>
        <span>
        Observações
        </span>
    </a>
