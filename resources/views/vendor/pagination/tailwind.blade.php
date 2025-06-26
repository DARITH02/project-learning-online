@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-1 my-4">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="px-3 py-1 rounded bg-gray-200 text-gray-500 cursor-not-allowed">&laquo;</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded bg-indigo-600 text-white hover:bg-indigo-700">&laquo;</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="px-3 py-1 rounded bg-gray-200 text-gray-500">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page" class="px-3 py-1 rounded bg-indigo-600 text-white">{{ $page }}</span>
                @else
                    <a href="?page=2" class="px-3 py-1 rounded bg-gray-100 hover:bg-indigo-100">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded bg-indigo-600 text-white hover:bg-indigo-700">&raquo;</a>
    @else
        <span class="px-3 py-1 rounded bg-gray-200 text-gray-500 cursor-not-allowed">&raquo;</span>
    @endif
</nav>
@endif
