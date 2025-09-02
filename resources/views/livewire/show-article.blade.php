<div>
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
