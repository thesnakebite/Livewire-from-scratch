<div class="block">
    <div class="mt-6">
        <div class="pb-12 flex justify-between">
            <flux:button
                href="articles/create"
                variant="filled"
                wire:navigate
            >
                Crear Artículo
            </flux:button>
        </div>
        <div class="flex justify-between items-center my-4">
            <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200">
                Artículos Recientes
            </h3>
            <div>
                <flux:button
                variant="filled"
                wire:click="showAll()"
            >
                Ver todos
            </flux:button>
            <flux:button
                variant="primary"
                class="bg-rose-400/40 text-rose-200"
                wire:click="showPublished()"
            >
                Ver publicados (<livewire:published-count placeholder-text="loading" />)
            </flux:button>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                <div
                    wire:key="{{ $article->id }}"
                    class="p-4 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-900 hover:shadow-md transition-shadow"
                    >
                    <h4 class="font-medium text-zinc-900 dark:text-zinc-100 mb-2">
                        <a
                            wire:navigate.hover
                            href="/article/{{ $article->id }}"
                            class="hover:text-rose-600 dark:text-zinc-400 dark:hover:text-rose-500"
                        >
                            {{ $article->title }}
                        </a>
                    </h4>
                    <p class="text-sm text-zinc-600 dark:text-zinc-600 line-clamp-3">
                        {{ str($article->content)->words(35) }}
                    </p>
                    <div class="mt-6">
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
            {{ $articles->links(data: ['scrollTo' => 'false']) }}
        </div>
    </div>
</div>
