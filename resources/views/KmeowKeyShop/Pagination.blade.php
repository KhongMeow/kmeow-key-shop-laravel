@if ($paginator->hasPages())
<nav aria-label="flex justify-center">
    <ul class="list-style-none flex">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <a class="cursor-not-allowed relative block rounded bg-gray-800 px-3 py-1.5 text-sm text-gray-100 transition-all duration-300">Previous</a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="relative block rounded bg-gray-800 px-3 py-1.5 text-sm text-gray-100 transition-all duration-300 hover:bg-gray-700">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pointer-events-none">
                    <span class="relative block rounded bg-blue-300 px-3 py-1.5 text-sm text-neutral-500 transition-all duration-300">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page">
                            <a href="{{ $url }}" class="relative block rounded bg-gray-700 px-3 py-1.5 text-sm font-medium text-gray-200 transition-all duration-300">
                                {{ $page }}
                                <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="relative block rounded bg-gray-800 px-3 py-1.5 text-sm text-gray-100 transition-all duration-300 hover:bg-gray-700">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="relative block rounded bg-gray-800 px-3 py-1.5 text-sm text-gray-100 transition-all duration-300 hover:bg-gray-600">Next</a>
            </li>
        @else
            <li>
                <a class="cursor-not-allowed relative block rounded bg-gray-800 px-3 py-1.5 text-sm text-gray-100 transition-all duration-300">Next</a>
            </li>
        @endif
    </ul>
</nav>
@endif
