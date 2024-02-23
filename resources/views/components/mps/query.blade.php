
<div class="row mx-3  align-items-center w-auto">
    <div class="col-8">
        <form action=" {{ route('mps.query') }} " method="post" >
            @csrf
        <div class="input-field">
            <label class="col-form-label" for='codigo'>Pesquisar: </label>
            <input class="form-control" type="text" id="chave" name="chave">
        </div>
    </div>
    <div class="col text-center mt-4">
        <button class="btn btn-primary shadow icon-link text-primary-emphasis bg-primary-subtle 
    border border-primary-subtle rounded-3" type="submit" name="bt_entrar" value="Pesquisar">
        <i class="material-icons">search</i>  Pesquisar
    </button>
    </div>
</form>
<div class="col text-center  mt-4">
    <a class="btn btn-primary icon-link shadow text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" href="{{ route('mps.create') }}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
          </svg>
                        Novo Registro
    </a>
</div>
</div>