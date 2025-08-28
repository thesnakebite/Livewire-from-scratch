<div
    class="flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_rgb(244_63_94)] rounded-lg"
>
    <div class="flex flex-col space-y-4 text-xl">
        <p class="font-medium">Bienvenido a...</p>
        <p class="text-zinc-700 dark:text-rose-500">Livewire v3</p>
        <form
            wire:submit="changeName(document.querySelector('#newName').value)"
            class="flex flex-col items-start space-y-2">
            <flux:badge
                size="lg"
                color="pink"
                icon="user-circle"
                class=" w-auto"
            >
                {{ $name }}
            </flux:badge>

            <flux:field class="my-6">

                <flux:input
                    id="newName"
                    class="max-w-xs"
                    size="sm"
                    variant="filled"
                    class:input="font-mono"
                    description="Escribe un nombre" />
            </flux:field>

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
