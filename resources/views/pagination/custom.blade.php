@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <button class="btn btn-sm btn-outline-secondary fw-bold m-1 disabled"> <span aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span></button>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <button class="btn btn-sm btn-outline-success fw-bold m-1">
                            <i class="fa-solid fa-angles-left"></i>
                        </button></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span><button class="btn btn-sm btn-success fw-bold m-1">{{ $page }}</button></span></li>
                        @else
                            <li><a href="{{ $url }}"><button class="btn btn-sm btn-outline-success fw-bold m-1">{{ $page }}</button></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <button class="btn btn-sm btn-outline-success fw-bold  m-1"> <span><i class="fa-solid fa-angles-right"></i></span></button>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <button class="btn btn-sm btn-outline-secondary fw-bold  m-1 disabled"> <span aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span></button>
                </li>
            @endif
        </ul>
    </nav>
@endif
