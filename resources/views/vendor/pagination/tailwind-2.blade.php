@if ($paginator->hasPages())
    <nav>
        <ul class="flex items-center justify-center p-4 mt-2 text-pink-600">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li 
                    aria-disabled="true" 
                    aria-label="@lang('pagination.previous')"
                >
                    <span 
                        aria-hidden="true"
                        class="cursor-pointer bg-pink-600 text-white px-4 py-2 m-1 border border-pink-600 rounded-md"
                    >
                        &lsaquo;
                    </span>
                </li>
            @else
                <li>
                    <a 
                        rel="prev"
                        wire:click="previousPage" 
                        aria-label="@lang('pagination.previous')"
                        class="cursor-pointer bg-white px-4 py-2 m-1 border border-pink-600 rounded-md hover:bg-pink-600 hover:text-white"
                    >
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="cursor-pointer bg-pink-600 text-white px-4 py-2 m-1 border border-pink-600 rounded-md">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a 
                                    wire:click="gotoPage({{ $page }})"
                                    class="cursor-pointer bg-white px-4 py-2 m-1 border border-pink-600 rounded-md hover:bg-pink-600 hover:text-white"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a  
                        wire:click="nextPage"
                        rel="next" 
                        aria-label="@lang('pagination.next')"
                        class="cursor-pointer bg-white px-4 py-2 m-1 border border-pink-600 rounded-md hover:bg-pink-600 hover:text-white"
                    >
                        &rsaquo;
                    </a>
                </li>
            @else
                <li 
                    aria-disabled="true"
                    aria-label="@lang('pagination.next')"
                >
                    <span 
                        aria-hidden="true"
                        class="cursor-pointer bg-pink-600 text-white px-4 py-2 m-1 border border-pink-600 rounded-md"
                    >
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif