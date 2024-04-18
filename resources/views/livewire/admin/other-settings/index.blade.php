<div class="flex flex-col min-h-screen ">
    @include('livewire.sidebar.sidebar')
        <div class="relative md:min-h-[20px] md:h-20 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
            <a href="javascript:history.back()"
                class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
                <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Other settings</h1>
            <div class="absolute inset-0 shadow-lg"></div>
        </div>
        <div class="ml-12">
            <div class="flex gap-5 m-4">
                <a class="hover:underline" href="{{ route('other-settings.index') }}">
                    <h2>Homepage Content</h2>
                </a>
                <a class="hover:underline" href="{{ route('other-settings.message') }}">
                    <h2>Messages Content</h2>
                </a>
            </div>

            <div class="m-3">
                {{-- Add Button --}}
                <x-button class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105" icon="plus" label="ADD" href="{{ route('other-settings.create') }}" target="_self"/>
            </div>

            <div class="m-4 mt-5">
                <livewire:table.clinic-information-table>
            </div>
        </div>
    @include('layout.footer-nav')
</div>
