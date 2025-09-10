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
                            wire:model="form.title"
                        />
                        <flux:error name="title" />
                    </flux:field>

                    <flux:field>
                        <flux:textarea
                            label="Ingresa la descrición del articulo"
                            wire:model="form.content"
                        />
                    </flux:field>
                    <!-- Checkbox with custom styles -->
                    <div class="my-5">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" wire:model.boolean="form.published" class="custom-checkbox">
                            <span class="text-sm font-medium text-zinc-800 dark:text-zinc-200">Publicado</span>
                        </label>
                    </div>

                    <!-- Checkbox with custom styles -->
                    <div class="mt-5">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-200">Opciones de Notificaciones</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model="form.notification"
                                    value="email"
                                    class="custom-radio"
                                >
                                <span class="text-sm text-zinc-800 dark:text-zinc-200">Correo</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model="form.notification"
                                    value="sms"
                                    class="custom-radio"
                                >
                                <span class="text-sm text-zinc-800 dark:text-zinc-200">SMS</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model="form.notification"
                                    value="none"
                                    class="custom-radio"
                                >
                                <span class="text-sm text-zinc-800 dark:text-zinc-200">Ninguna</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-right">
                    <flux:button
                        icon:trailing="arrow-up-right"
                        type="submit"
                        size="sm"
                        variant="primary"
                        class="bg-rose-700 dark:bg-rose-400 hover:bg-rose-800 dark:hover:bg-rose-500 cursor-pointer transition-colors"
                    >
                        Crear
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</div>
