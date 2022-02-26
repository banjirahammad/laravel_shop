
@if ($paginator->hasPages())
    <nav class="navigation pull-right">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="next-page disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="pointer-events: none;" aria-hidden="true"><i class="fa fa-angle-left"></i></a>
        @else
            <a class="next-page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page-num disabled " aria-disabled="true" >{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-num current" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="page-num" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next-page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
        @else
            <a class="next-page" aria-disabled="true" aria-label="@lang('pagination.next')" aria-hidden="true"><i class="fa fa-angle-right"></i></a>
        @endif
    </nav>
@endif

