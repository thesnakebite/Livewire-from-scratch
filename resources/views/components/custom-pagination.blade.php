@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Navegación de páginas" class="flex items-center justify-between">
            {{-- Vista móvil: Solo Anterior/Siguiente --}}
            <div class="flex justify-between flex-1 lg:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-500 bg-white border border-zinc-300 cursor-default leading-5 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300">
                            Anterior
                        </span>
                    @else
                        <button
                            type="button"
                            wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                            wire:loading.attr="disabled"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-700 bg-white border border-zinc-300 leading-5 hover:text-zinc-500 focus:outline-none focus:ring ring-rose-300 focus:border-rose-300 active:bg-zinc-100 active:text-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300 dark:hover:text-zinc-200"
                        >
                            Anterior
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-zinc-700 bg-white border border-zinc-300 leading-5 hover:text-zinc-500 focus:outline-none focus:ring ring-rose-300 focus:border-rose-300 active:bg-zinc-100 active:text-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300 dark:hover:text-zinc-200">
                            Siguiente
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-zinc-500 bg-white border border-zinc-300 cursor-default leading-5 dark:text-zinc-600 dark:bg-zinc-800 dark:border-zinc-600">
                            Siguiente
                        </span>
                    @endif
                </span>
            </div>

            {{-- Vista escritorio: Navegación completa --}}
            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm text-zinc-700 leading-5 dark:text-zinc-400">
                        <span>Mostrando</span>
                        <span class="font-bold">{{ $paginator->firstItem() }}</span>
                        <span>a</span>
                        <span class="font-bold">{{ $paginator->lastItem() }}</span>
                        <span>de</span>
                        <span class="font-bold">{{ $paginator->total() }}</span>
                        <span>resultados</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="Anterior">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-500 bg-white border border-zinc-300 cursor-default leading-5 dark:bg-zinc-800 dark:border-zinc-600" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-500 bg-white border border-zinc-300 leading-5 hover:text-zinc-400 focus:z-10 focus:outline-none focus:border-rose-300 focus:ring ring-rose-300 active:bg-zinc-100 active:text-zinc-500 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-600 dark:hover:text-zinc-300" aria-label="Anterior">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-zinc-700 bg-white border border-zinc-300 cursor-default leading-5 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 z-10 -ml-px text-sm font-medium text-rose-200 bg-rose-400/40 border border-rose-500 cursor-default leading-5">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-zinc-700 bg-white border border-zinc-300 leading-5 hover:text-zinc-500 focus:z-10 focus:outline-none focus:border-rose-300 focus:ring ring-rose-300 active:bg-zinc-100 active:text-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-400 dark:hover:text-zinc-300" aria-label="Ir a página {{ $page }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-zinc-500 bg-white border border-zinc-300 leading-5 hover:text-zinc-400 focus:z-10 focus:outline-none focus:border-rose-300 focus:ring ring-rose-300 active:bg-zinc-100 active:text-zinc-500 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-600 dark:hover:text-zinc-300" aria-label="Siguiente">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="Siguiente">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-zinc-500 bg-white border border-zinc-300 cursor-default leading-5 dark:bg-zinc-800 dark:border-zinc-600" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
