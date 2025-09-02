<div class="block">
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-4">
            Artículos Recientes
        </h3>
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
                            <flux:button size="xs" icon="bars-3"></flux:button>
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
    </div>
</div>
