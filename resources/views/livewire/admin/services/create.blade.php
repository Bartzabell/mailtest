<div>
    @include("livewire.sidebar.sidebar")
    <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()"
            class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Create Services</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>
    <div class="w-2/3 p-5 m-auto mt-10 h-3/4 min-w-[500px]">

        <x-card title="Create New Service" rounded="3xl">
            <div class="flex gap-x-5">
                <x-input class="p-2" label="Name" placeholder="Service Name" wire:model='name' />
                <x-inputs.currency class="p-2" label="Service Cost" placeholder="₱" wire:model='price' />
            </div>

            <div class="flex gap-x-5">

                <x-inputs.number class="p-2" label="Minutes Take" wire:model='minutesTake' />


            </div>

            <x-textarea class="p-2" wire:model="description" label="Description" placeholder="Service Description" />

            <x-slot name="footer" class="flex items-center justify-between">
                <div class="justify-end">
                    <x-button label="Cancel" flat href="{{ route('services.index') }}" target="_self" />

                    <x-button indigo label="Save" wire:click='createService' />
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
