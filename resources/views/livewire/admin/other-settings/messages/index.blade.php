<div class="flex flex-col min-h-screen ">
    @include('livewire.sidebar.sidebar')
    <div class="ml-12">
        <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
            <h1 class="relative z-10 text-xl font-semibold tracking-tight text-gray-700">Other Settings > Messages</h1>
            <div class="absolute inset-0 shadow-lg"></div>
        </div>
        <div class="flex gap-5 m-4">
            <a class="hover:underline" href="{{ route('other-settings.index') }}">
                <h2>Homepage Content</h2>
            </a>
            <a class="hover:underline" href="{{ route('other-settings.message') }}">
                <h2>Messages Content</h2>
            </a>
        </div>

        <div class="m-4 mt-5">
            <livewire:table.messages-table>
        </div>
    </div>
    @include('layout.footer-nav')
</div>
