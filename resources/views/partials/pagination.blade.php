
@if ($paginator->hasPages())
<div class="text-center d-flex justify-content-center">
    <div class="post-pagination mt-10">
        @if ($paginator->onFirstPage())
            <a class="page" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="fa fa-angle-left"></i> </a>
        @else
            <a class="page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="fa fa-angle-left"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="fa fa-angle-right"></i> </a>
        @else
            <a class="page" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="fa fa-angle-right"></i> </a>
        @endif
    </div><!-- /.post-pagination -->
</div><!-- /.text-center d-flex justify-content-center -->
@endif

