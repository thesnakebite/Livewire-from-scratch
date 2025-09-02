<div class="{{ $show ? 'block' : 'hidden' }}">
    <div class="mt-4 p-4 absolute border border-zinc-200 dark:border-zinc-700 rounded-md bg-white dark:bg-zinc-900 shadow-lg">
        <div class="absolute top-0 right-0 pt-1 pr-1">
            <flux:button
                wire:click="$dispatch('clear-search')"
                variant="ghost"
                size="sm"
                icon="x-mark"
                inset="top bottom left right"
            />
        </div>
        @if (count($results) == 0)
            <p class="text-xs text-zinc-300 font-bold pr-8">No resultados encontrados</p>
        @endif
        @foreach ($results as $result)
            <div
                wire:key="{{ $result->id }}"
                class="text-xs text-rose-300 font-bold p-2 mb-2"
            >
                <a
                    wire:navigate.hover
                    href="/article/{{ $result->id }}"
                >
                    {{ $result->title }}
                </a>
            </div>
        @endforeach
    </div>
</div>
