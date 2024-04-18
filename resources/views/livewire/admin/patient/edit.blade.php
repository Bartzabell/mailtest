<div class="flex flex-col min-h-screen">
    @include("livewire.sidebar.sidebar")
    <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()"
            class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Edit Patient Records</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="w-4/5 p-5 m-auto mt-7 h-3/4 min-w-[500px]">
        <x-card title="Edit Patient Information" rounded="3xl">
            <div class="mb-5">
                <h2 class="mb-2">Personal Information</h2>
                <div class="flex gap-x-5">
                    <x-input class="p-2" label="Last Name" placeholder="Last Name" wire:model.defer='lastName' />
                    <x-input class="p-2" label="First Name" placeholder="First Name" wire:model.defer='firstName' />
                    <x-input class="p-2" label="Middle Name" placeholder="Middle Name"
                        wire:model.defer='middleName' />
                    <x-input class="p-2" label="Extension Name" placeholder="Extension Name"
                        wire:model.defer='extensionName' />
                </div>
            </div>

            <div class="flex flex-row mb-5">
                <div class="w-1/2 pr-4">
                    <x-datetime-picker label="Birthdate" class="p-2" placeholder="Date of birth" :min="now()->subDays(36500)"
                        :max="now()" display-format="MMMM DD, YYYY" without-time wire:model.lazy="birthdate" />
                </div>
                <div class="pr-4 w-1/8">
                    <h1 class="text-sm font-semibold text-left text-gray-400">Age</h1>
                    <p class="w-full min-w-[70px] px-2 pt-2 mt-1 border rounded-md shadow-sm h-10">{{ $age }}</p>
                </div>
                <div class="pr-4 w-1/8">
                    <h1 class="text-sm font-semibold text-left text-gray-400">Sex</h1>
                    <div class="flex gap-3 py-3">
                        <x-radio id="female" label="Female" wire:model.defer="sex" value="female"/>
                        <x-radio id="male" label="Male" wire:model.defer="sex" value="male"/>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="mb-2">Contact Information</h2>
                <div class="flex pb-5 gap-x-5">
                    <x-input class="p-2 pr-28" label="Email" placeholder="your email" suffix="@mail.com" wire:model.defer="email"/>

                    <x-inputs.phone class="p-2" label="Contact Number" mask="#### ### ####"
                        wire:model.defer="phoneNumber" />
                </div>
            </div>

            <div>
                <h2>Address</h2>
                <div class="flex gap-2 pb-2">
                    <div class="w-1/3">
                        <x-select id="adminProvince" class="p-2" label="*Province" wire:model.lazy="provinceId"
                                placeholder="Select Province" :async-data="route('province.references')" option-label="province_description"
                                option-value="id" />
                    </div>
                    <div class="w-1/3">
                        <x-select id="adminCity" class="p-2 select-dropdown" label="*City" wire:model.lazy="cityId"
                                placeholder="Select City" :async-data="route('city.references')" option-label="city_municipality_description"
                                option-value="id" />
                    </div>

                    <div class="w-1/3">
                        <x-select id="adminBarangay" class="p-2 select-dropdown" label="*Barangay" wire:model.lazy="barangayId"
                                placeholder="Select Barangay" :async-data="route('barangay.references')" option-label="barangay_description"
                                option-value="id" />
                    </div>
                </div>
            </div>
            <x-slot name="footer" class="flex items-center justify-between">
                <div class="justify-end">
                    <x-button class="text-black bg-white border-2 border-blue-500 rounded-lg hover:scale-105"
                    label="Cancel" flat href="{{ route('patient.index') }}" target="_self" />
                    <x-button class="text-white rounded-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                    label="Save" wire:click='saveConfirmation' />
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
