@if ($paginator->hasPages())
    <div class="row justify-center pt-60 lg:pt-40" data-anim="slide-up delay-1">
        <div class="col-auto">
            <div class="pagination -buttons">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <div class="pagination__button -prev">
                            <i class="icon icon-chevron-left"></i>
                        </div>
                    </a>
                @endif

                <div class="pagination__count">
                    @if ($paginator->currentPage() > 3)
                        <a href="{{ $paginator->url(1) }}">1</a>
                    @endif

                    @if ($paginator->currentPage() > 4)
                        <span>...</span>
                    @endif

                    @foreach (range(1, $paginator->lastPage()) as $i)
                        @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                            @if ($i == $paginator->currentPage())
                                <a class="-count-is-active" href="javascript:void(0)">{{ $i }}</a>
                            @else
                                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            @endif
                        @endif
                    @endforeach

                    @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                        <span>...</span>
                    @endif

                    @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                        <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    @endif
                </div>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <div class="pagination__button -prev">
                            <i class="icon icon-chevron-right"></i>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- template not use --}}
    @if (false)
        <div class="row justify-center pt-60 lg:pt-40" data-anim="slide-up delay-5">
            <div class="col-auto">
                <div class="pagination -buttons">
                    @if (!$paginator->onFirstPage())
                        <a href="{{ $paginator->previousPageUrl() }}" class="pagination__button -prev">
                            <i class="icon icon-chevron-left"></i>
                        </a>
                    @endif
                    <div class="pagination__count">
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span>...</span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <a class="-count-is-active" href="javascript:void(0)">{{ $page }}</a>
                                    @else
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="pagination__button -prev">
                            <i class="icon icon-chevron-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    {{-- origin --}}
    @if (false)
        <nav class="d-flex justify-items-center justify-content-between">
            <div class="d-flex justify-content-between flex-fill d-sm-none">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.previous')</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                                @lang('pagination.previous')
                            </a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                                rel="next">@lang('pagination.next')</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.next')</span>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                <div>
                    <p class="small text-muted">
                        {!! __('Showing') !!}
                        <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="fw-semibold">{{ $paginator->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>

                <div>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">&lsaquo;
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true"><span
                                        class="page-link">{{ $element }}</span></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                    aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif
@endif
