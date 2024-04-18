<div>
    @include('livewire.sidebar.sidebar')
    <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()"
            class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Other Settings > Homepage Content</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="ml-12">
    <div class="md:w-full lg:w-1/2 md:mx-0 lg:mx-auto mt-32 h-3/4 min-w-[450px]">

        <x-card title="Create New Homepage Content" rounded="3xl">
            <div class="flex flex-col mb-5 md:w-full lg:w-full md:flex-row gap-x-5">
                <div class="mb-3 md:w-full md:mb-0 lg:w-1/2">
                    <x-input class="p-2" label="Name" placeholder="Name/Title" wire:model='name' />
                </div>
                <div class="md:w-full lg:w-1/2">
                    <x-select label="Select Type" placeholder="Select type" :options="[
                        ['name' => 'Subtitle', 'value' => 'subtitle'],
                        ['name' => 'About', 'value' => 'about'],
                        ['name' => 'Services', 'value' => 'services'],
                        ['name' => 'Contact', 'value' => 'contact'],
                    ]" option-label="name"
                        option-value="value" wire:model.defer="type" />
                </div>
            </div>
            <div class="md:w-full lg:w-full">
            <x-textarea class="p-2" wire:model="content" label="Content"
                placeholder="This is the content to be displayed" />

            <x-slot name="footer" class="flex items-center justify-between">
                <div class="justify-end">
                    <x-button class="text-black bg-white border-2 border-blue-500 rounded-lg hover:scale-105" label="Cancel" flat href="{{ route('other-settings.index') }}" target="_self" />

                    <x-button class="text-white rounded-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105" label="Save" wire:click='createContent' />
                </div>
            </x-slot>
            </div>
        </x-card>
    </div>
    </div>
</div>

