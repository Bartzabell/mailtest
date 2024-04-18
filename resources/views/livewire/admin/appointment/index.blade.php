<div class="flex flex-col min-h-screen">
    {{-- @include('layout.sidecalendar') --}}
    @include('livewire.sidebar.sidebar')
    <div class="relative md:min-h-[20px] md:h-20 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()"
            class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Appointment</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="ml-12">
        <div class="flex flex-row gap-5">
            <div class="flex items-center mb-5 ml-6"> {{-- Add flex and items-center here --}}
                <x-button
                    class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                    icon="plus" label="ADD" href="{{ route('appointment.create') }}" target="_self" />
                <x-button id="toggleCalendarButton"
                    class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                    label="Hide Calendar" onclick="toggleCalendar()" />
            </div>
        </div>
        {{-- <div id="calendar" class="w-3/4 ml-auto mr-auto h-1/4"> --}}
            @include('calendar.index')
        {{-- </div> --}}
        <div class="m-5">
            <livewire:table.appointment-table />
        </div>
    </div>
    @include('layout.footer-nav')
</div>

<script>
    function toggleCalendar() {
        var calendar = document.getElementById('calendar');
        var button = document.getElementById('toggleCalendarButton');

        if (calendar.style.display === 'none') {
            calendar.style.display = 'block';
            button.innerText = 'Hide Calendar';
        } else {
            calendar.style.display = 'none';
            button.innerText = 'View Calendar';
        }
    }
</script>
