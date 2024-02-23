
@props(['mp'])


<a class="col-3 btn btn-primary shadow icon-link text-white bg-dark border border-black rounded-3" href="{{ route('mps.show', ['mp' => $mp]) }}">
    <i class="small material-icons">description</i>
    <span>
    Informações Básicas
    </span>
</a>
