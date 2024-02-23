
@props(['mp'])


        <a class="col-3 btn btn-primary shadow icon-link text-white bg-dark border border-black rounded-3" href="{{ route('lotes.index', ['mp' => $mp]) }}">
            <i class="small material-icons">view_list</i>
            <span>
            Lotes
            </span>
        </a>
