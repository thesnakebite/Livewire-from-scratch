<div>
    @if ($article->photo_path)
        <div class="mb-4 aspect-square size-44 rounded border border-zinc-500 dark:border-zinc-300">
            <img
                src="{{ Storage::url($article->photo_path) }}"
                alt="{{ $article->title }}"
                class="size-full object-cover"
            >
        </div>
    @else
        <div class="my-8 max-w-xs">
            <flux:callout icon="photo">
                <flux:callout.text>
                    Este artículo no tiene imagen
                </flux:callout.text>
            </flux:callout>
        </div>
    @endif
    <h2 class="text-2xl text-rose-400">
        {{ $article->title }}
    </h2>
    <div class="mt-4 text-zinc-600 dark:text-zinc-400">
        {{ $article->content }}
    </div>
    <div class="mt-4">
        <flux:button
            wire:navigate.hover
            href="/search"
            icon="arrow-left"
            variant="primary"
            color="rose"
        >
            Atrás
        </flux:button>
    </div>
</div>
