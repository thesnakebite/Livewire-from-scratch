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

                    <flux:input
                        wire:model="form.photo"
                        type="file"
                        label="Foto artículo"
                    />
                    @if ($form->photo)
                        <img
                            class="size-28 aspect-square rounded"
                            src="{{ $form->photo->temporaryUrl() }}"
                            alt="{{ $form->title }}"
                        >
                    @endif

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
                        <div class="flex justify-start gap-3 mt-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model.boolean="form.allowNotifications"
                                    value="true"
                                    class="custom-radio"
                                >
                                <span class="text-sm text-zinc-800 dark:text-zinc-200">Si</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model.boolean="form.allowNotifications"
                                    value="false"
                                    class="custom-radio"
                                >
                                <span class="text-sm text-zinc-800 dark:text-zinc-200">No</span>
                            </label>
                        </div>
                        <div class="mt-5 flex flex-col">
                            <div
                                x-show="$wire.form.allowNotifications"
                                class="space-y-2">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        wire:model="form.notifications"
                                        value="email"
                                        class="custom-checkbox"
                                    >
                                    <span class="text-sm text-zinc-800 dark:text-zinc-200">Correo electrónico</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        wire:model="form.notifications"
                                        value="sms"
                                        class="custom-checkbox"
                                    >
                                    <span class="text-sm text-zinc-800 dark:text-zinc-200">SMS</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        wire:model="form.notifications"
                                        value="whatsapp"
                                        class="custom-checkbox"
                                    >
                                    <span class="text-sm text-zinc-800 dark:text-zinc-200">WhatsApp</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-right">
                    <flux:button
                        icon:trailing="check"
                        type="submit"
                        size="sm"
                        variant="primary"
                        class="bg-rose-700 dark:bg-rose-400 dark:hover:bg-rose-500 cursor-pointer mb-6 transition-colors disabled:opacity-75 disabled:bg-rose-300"
                        wire:dirty.class="hover:bg-rose-800"
                        wire:dirty.remove.attr="disabled"
                        disabled
                    >
                        Crear
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</div>
