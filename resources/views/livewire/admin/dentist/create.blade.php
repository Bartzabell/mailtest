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
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Dentists</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>
    <div class="w-4/5 p-5 m-auto mt-10 h-3/4 min-w-[500px]">
        <x-card title="Add New Dentist" rounded="3xl" id="custom-shadow-x-card">
            <div>
                <h2>Personal Information</h2>
                <div class="flex gap-x-5">
                    <x-input class="p-2" label="Last Name" placeholder="Last Name" wire:model.defer='lastName' />
                    <x-input class="p-2" label="First Name" placeholder="First Name" wire:model.defer='firstName' />
                    <x-input class="p-2" label="Middle Name" placeholder="Middle Name"
                        wire:model.defer='middleName' />
                    <x-input class="p-2" label="Extension Name" placeholder="Extension Name"
                        wire:model.defer='extensionName' />
                </div>
            </div>

            <div>
                <x-input class="p-2" label="License Number" placeholder="input license number" wire:model.defer='licenseNumber'/>
            </div>

            <div>
                <h2>Contact Information</h2>
                <div class="flex pb-5 gap-x-5">
                    <x-input class="p-2 pr-28" label="Email" placeholder="your email" suffix="@mail.com"
                        wire:model.defer="email" />
                </div>
            </div>

            <div>
                <div>
                    <x-inputs.password class="p-2" label="Password" wire:model.lazy="password" />
                    <p>password will be the last name when left empty</p>
                </div>
            </div>

            <x-slot name="footer" class="flex items-center justify-between">
                <div class="justify-end">
                    <x-button class="outline" label="Cancel" flat href="{{ route('patient.index') }}" target="_self" />
                    <x-button indigo label="Save" wire:click='createPatient' />
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
