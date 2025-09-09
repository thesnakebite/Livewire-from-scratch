<div class="m-auto w-full">
    <div
        class="p-8 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-900"
    >
        <h1 class="text-xl font-medium text-zinc-900 mb-2 dark:text-rose-500">
            Crear Articulo
        </h1>

        <div class="mt-6">
            <form wire:submit="save">
                <div class="space-y-4">
                    <flux:field>
                        <flux:label>Título</flux:label>
                        <flux:input
                            wire:model="title"
                        />
                        <flux:error name="title" />
                    </flux:field>

                    <flux:field>
                        <flux:textarea
                            label="Ingresa la descrición del articulo"
                            wire:model="content"
                        />
                    </flux:field>
                </div>

                <div class="mt-8 text-right">
                    <flux:button
                        icon:trailing="arrow-up-right"
                        type="submit"
                        size="sm"
                        variant="primary"
                        class="bg-rose-700 dark:bg-rose-400 hover:bg-rose-800 dark:hover:bg-rose-500 cursor-pointer mb-6 transition-colors"
                    >
                        Crear
                    </flux:button>
                </div>

            </form>
        </div>
    </div>
</div>
