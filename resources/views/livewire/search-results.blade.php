<div class="{{ $show ? 'block' : 'hidden' }}">
    <div class="mt-4 p-4 absolute border border-zinc-200 dark:border-zinc-700 rounded-md bg-white dark:bg-zinc-900 shadow-lg">
        @if (count($results) == 0)
            <p class="text-xs text-zinc-300 font-bold">No resultados encontrados</p>
        @endif
        @foreach ($results as $result)
            <div class="text-xs text-rose-300 font-bold p-2 mb-2">
                <a href="/article/{{ $result->id }}">{{ $result->title }}</a>
            </div>
        @endforeach
    </div>
</div>
