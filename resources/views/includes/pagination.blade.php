@if ($paginator->hasPages())
    <nav aria-label="Navegação">
    <ul class="pagination  justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><i class="page-link">&laquo;</i></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><a class="page-link" href="">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a class="page-link bg-light-subtle text-dark"> {{ $page}} </a>
                        </li>
                    @else
                        <li ><a class="page-link bg-light-subtle" href="{{ $url }}"> {{$page}} </a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
        @else
            <li class=" disabled"><a class="page-link href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
        @endif
    </ul>
</nav>
@endif
