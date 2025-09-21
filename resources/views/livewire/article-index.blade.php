<div class="block">
    <div class="mt-6">
        <div wire:offline class="mb-6 w-full">
            <flux:callout variant="warning" icon="exclamation-triangle" class="mx-auto">
                <flux:callout.text>
                    Sin conexión. Los cambios se guardarán cuando vuelvas a estar online.
                </flux:callout.text>
            </flux:callout>
        </div>

        <div class="pb-12 flex justify-between">
            <flux:button
                href="articles/create"
                variant="filled"
                wire:navigate
                wire:offline.class="opacity-50 pointer-events-none"
            >
                Crear Artículo
            </flux:button>
        </div>
        <div class="flex justify-between items-center my-4">
            <h3
                class="text-lg font-semibold text-zinc-800 dark:text-zinc-200"
                wire:offline.class="text-zinc-500 dark:text-zinc-600"
            >
                Artículos Recientes
            </h3>
            <div
                wire:offline.class="opacity-50 pointer-events-none"
            >
                <flux:button
                    @class([
                        'cursor-pointer' => $showOnlyPublished,
                        'bg-rose-400/40 hover:bg-rose-400/30 text-rose-800 dark:text-rose-200 cursor-pointer' => !$showOnlyPublished,
                    ])
                    variant="primary"
                    wire:click="togglePublished(false)"
                >
                    Ver todos
                </flux:button>
                <flux:button
                    @class([
                        'bg-rose-400/40 hover:bg-rose-400/30 text-rose-800 dark:text-rose-200 cursor-pointer' => $showOnlyPublished,
                        'cursor-pointer' => !$showOnlyPublished,
                    ])
                    variant="primary"
                    wire:click="togglePublished(true)"
                >
                    Ver publicados (<livewire:published-count placeholder-text="loading" />)
                </flux:button>
            </div>
        </div>

        @if (session('status'))
            <div class="flex items-center gap-3 bg-zinc-200 border border-zinc-200 text-zinc-800 px-4 py-3 rounded-lg mb-4 dark:bg-zinc-500/40 dark:border-zinc-800 dark:text-zinc-300">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($this->articles as $article)
                <div
                    wire:key="{{ $article->id }}"
                    class="p-4 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-900 hover:shadow-md transition-shadow"
                    wire:offline.class="opacity-75 bg-zinc-50 dark:bg-zinc-950"
                    >
                    <h4
                        class="font-medium text-zinc-900 dark:text-zinc-400 hover:text-rose-600 dark:hover:text-rose-600 mb-2"
                        wire:offline.class="text-zinc-500 dark:text-zinc-600"
                    >
                        <a
                            wire:navigate.hover
                            href="/article/{{ $article->id }}"
                            wire:offline.class="pointer-events-none"
                        >
                            {{ $article->title }}
                        </a>
                    </h4>
                    <p
                        class="text-sm text-zinc-600 dark:text-zinc-600 line-clamp-3"
                        wire:offline.class="text-zinc-400 dark:text-zinc-700"
                    >
                        {{ str($article->content)->words(35) }}
                    </p>
                    <div
                        class="mt-6"
                        wire:offline.class="opacity-50 pointer-events-none"
                    >
                        <flux:button.group>
                            <flux:button size="xs" icon="bars-3-bottom-left"></flux:button>
                            <flux:button
                                href="/articles/{{ $article->id }}/edit"
                                size="xs"
                                icon="pencil-square"
                                variant="filled"
                                class="hover:bg-zinc-500 hover:text-blue-500"
                                wire:navigate
                            >
                            </flux:button>
                            <flux:button
                                size="xs"
                                icon="archive-box-x-mark"
                                variant="primary"
                                class="text-red-500 bg-white dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-900"
                                wire:click="delete({{ $article->id }})"
                                wire:confirm="¿Estás seguro de querer eliminar este artículo?"
                            >
                            </flux:button>
                        </flux:button.group>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $this->articles->links('components.custom-pagination', data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
