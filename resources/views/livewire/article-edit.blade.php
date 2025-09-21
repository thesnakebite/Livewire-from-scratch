<div class="m-auto w-full">
    <div
        class="p-8 border border-zinc-200 dark:border-zinc-700 rounded-lg bg-white dark:bg-zinc-900"
    >
        <h1 class="text-xl font-medium text-zinc-900 mb-2 dark:text-rose-500">
            Editar Artículo {{ $form->id }}
        </h1>

        <div class="mt-6">
            <form wire:submit="save">
                <div class="space-y-4">
                    <flux:field>
                        <flux:label
                            class="transition-colors"
                            wire:dirty.class="text-orange-400 font-medium"
                            wire:target="form.title"
                        >
                            Título
                            <span wire:dirty wire:target="form.title">*</span>
                        </flux:label>
                        <flux:input
                            wire:model="form.title"
                        />
                        <flux:error name="form.title" />
                    </flux:field>

                    <flux:field>
                        <flux:label
                            class="transition-colors"
                            wire:dirty.class="text-orange-400 font-medium"
                            wire:target="form.content"
                        >
                            Ingresa la descrición del articulo
                            <span wire:dirty wire:target="form.content">*</span>
                        </flux:label>
                        <flux:textarea wire:model="form.content" />
                        <flux:error name="form.content" />
                    </flux:field>

                    <flux:field>
                        <flux:input
                            wire:model="form.photo"
                            type="file"
                            accept="image/*"
                            label="Foto artículo"
                        />
                    </flux:field>
                    <div class="flex items-start gap-4">
                        @if ($form->photo)
                            <img
                                class="size-28 aspect-square rounded object-cover"
                                src="{{ $form->photo->temporaryUrl() }}"
                                alt="{{ $form->title }}"
                            >
                        @elseif($form->photo_path)
                            <img
                               class="size-28 aspect-square rounded object-cover"
                               src="{{ Storage::url($form->photo_path) }}"
                               alt="{{ $form->title }}"
                            >
                            <div class="flex flex-col gap-2">
                                <flux:button
                                    wire:click="downloadPhoto"
                                    variant="outline"
                                    size="sm"
                                    icon="arrow-down-tray"
                                >
                                    Descargar imagen
                                </flux:button>
                            </div>
                        @endif
                    </div>

                     <!-- Checkbox with custom styles -->
                     <div class="my-5">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" wire:model.boolean="form.published" class="custom-checkbox">
                            <span
                                class="text-sm text-zinc-800 dark:text-zinc-200 transition-colors"
                                wire:dirty.class="!text-orange-400 !font-medium"
                                wire:target="form.published"
                            >
                                Publicado
                                <span wire:dirty wire:target="form.published">*</span>
                            </span>
                        </label>
                    </div>

                    <!-- Checkbox with custom styles -->
                    <div class="mt-5">
                        <div
                            class="text-sm text-zinc-800 dark:text-zinc-200 transition-colors"
                            wire:dirty.class="!text-orange-400 !font-medium"
                            wire:target="form.notifications"
                        >
                            Opciones de Notificaciones
                            <span wire:dirty wire:target="form.notifications">*</span>
                        </div>
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
                                class="space-y-2"
                                wire:transition
                            >
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
                        class="bg-rose-700 dark:bg-rose-400 dark:hover:bg-rose-500 cursor-pointer mb-6 transition-colors"
                    >
                        Actualizar
                    </flux:button>
                </div>

            </form>
        </div>
    </div>
</div>
