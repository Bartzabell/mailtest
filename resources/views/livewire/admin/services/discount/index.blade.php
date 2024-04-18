<div class="flex flex-col min-h-screen">
    @include("livewire.sidebar.sidebar")
    <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()" class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Discounts</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>
    {{-- <div class="m-3">
        <x-button outline indigo label="Home" href="{{ route('dashboard.index') }}" target="_self" />
        <x-button outline indigo label="Appointment" href="{{ route('appointment.index') }}" target="_self" />
        <x-button outline indigo label="Patient Records" href="{{ route('patient.index') }}" target="_self" />
        <x-button outline indigo label="User" href="{{ route('user.index') }}" target="_self" />
        <x-button outline indigo label="Services" href="{{route('services.index')}}" target="_self"/>
    </div> --}}
    <div class="ml-14">
    <div class="m-3">
        {{-- Add Button --}}
        <div class="mb-3">
            <a class="text-black underline mr-7" label="Services" href="{{ route('services.index') }}" target="_self">View Services</a>
            <a class="text-black underline mr-7" label="Discounts" href="{{ route('services.discounts') }}" target="_self">View Discounts</a>
         </div>
        <x-button class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
        icon="plus" label="A D D" href="{{ route('services.discounts') }}" target="_self"/>
    </div>
    <div class="m-5">
        <livewire:table.discount-table />
    </div>
    </div>
    @include('layout.footer-nav')
</div>
