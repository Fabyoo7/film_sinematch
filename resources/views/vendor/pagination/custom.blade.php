@if ($paginator->hasPages())
    <ul class="paginator">

        {{-- Previous Page Link --}}
        <li class="paginator__item paginator__item--prev">
            @if ($paginator->onFirstPage())
                <span><i class="ti ti-chevron-left"></i></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ti ti-chevron-left"></i></a>
            @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Dots (Three Dots Separator) --}}
            @if (is_string($element))
                <li class="paginator__item"><span>{{ $element }}</span></li>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="paginator__item {{ $page == $paginator->currentPage() ? 'paginator__item--active' : '' }}">
                        @if ($page == $paginator->currentPage())
                            <span>{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <li class="paginator__item paginator__item--next">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="ti ti-chevron-right"></i></a>
            @else
                <span><i class="ti ti-chevron-right"></i></span>
            @endif
        </li>

    </ul>
@endif
