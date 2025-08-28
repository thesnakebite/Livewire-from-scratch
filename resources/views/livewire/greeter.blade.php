<div
    class="flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_rgb(244_63_94)] rounded-lg"
>
    <div class="flex flex-col space-y-4 text-xl">

        @if ($name !== '')
            <p class="text-2xl font-medium">{{ $greeting }}<span class="text-rose-500">,</span> <span class="text-zinc-500">{{ $name }}</span></p>
            <p class="font-medium">desde</p>
            <p class="text-zinc-700 dark:text-rose-500">Livewire v3</p>
        @endif

        <form
            wire:submit="changeName"
            class="flex flex-col items-start space-y-2"
        >
            <div class="flex justify-between items-center w-full">
                <flux:field class="my-6">
                    <flux:input
                        id="newName"
                        class="max-w-xs"
                        size="sm"
                        variant="filled"
                        class:input="font-mono"
                        description="Escribe un nombre"
                        wire:model="name"
                    />

                    <flux:select
                        wire:model.fill="greeting"
                        description="Selecciona un saludo"
                    >
                        <flux:select.option>Hola</flux:select.option>
                        <flux:select.option>Hi!</flux:select.option>
                        <flux:select.option>Bonjour</flux:select.option>
                        <flux:select.option selected>Konnichiwa</flux:select.option>
                        <flux:select.option>Om Swastiastu</flux:select.option>
                        <flux:select.option>Namaste</flux:select.option>
                        <flux:select.option>Hallo</flux:select.option>
                    </flux:select>
                </flux:field>
            </div>

            <flux:button
                icon:trailing="arrow-up-right"
                type="submit"
                size="sm"
                variant="primary"
                class="bg-rose-700 dark:bg-rose-400 hover:bg-rose-800 dark:hover:bg-rose-500 cursor-pointer w-full mb-6 transition-colors"
            >
                Greet
            </flux:button>
        </form>
    </div>
</div>
