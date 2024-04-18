<div class="flex flex-col min-h-screen">
    @include('livewire.sidebar.sidebar')
        <div class="relative md:min-h-[20px] md:h-20 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
            <a href="javascript:history.back()"
                class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
                <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Dentists</h1>
            <div class="absolute inset-0 shadow-lg"></div>
        </div>
        <div class="ml-12">
            <div class="m-3">
                {{-- Add Button --}}
                <x-button class="bg-blue-500 hover:bg-black" style="color: white;" icon="plus" label="Add" href="{{ route('dentist.create') }}" target="_self"/>
            </div>
            <div class="m-5">
                <livewire:table.dentists-table />
            </div>
        </div>
    @include('layout.footer-nav')
</div>
