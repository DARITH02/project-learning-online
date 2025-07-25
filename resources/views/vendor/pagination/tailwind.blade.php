@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between bg-mode p-3 rounded shadow-sm">
    <div class="flex justify-between flex-1 sm:hidden">
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-mode border border-gray-300 cursor-default rounded-md leading-5">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-mode border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-mode border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-mode border border-gray-300 cursor-default rounded-md leading-5">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </div>

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-600 leading-5">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

        <div>
            <span class="inline-flex shadow-sm rounded-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-mode border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                            ‹
                        </span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-mode border border-gray-300 rounded-l-md leading-5 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition" aria-label="{{ __('pagination.previous') }}">
                        ‹
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-mode border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold text-white bg-blue-600 border border-blue-600 cursor-default leading-5 rounded">{{ $page }}</span>
                                </span>
                            @else
                                <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-mode border border-gray-300 leading-5 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-700 bg-mode border border-gray-300 rounded-r-md leading-5 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:border-blue-300 active:bg-gray-200 transition" aria-label="{{ __('pagination.next') }}">
                        ›
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-400 bg-mode border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                            ›
                        </span>
                    </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif
