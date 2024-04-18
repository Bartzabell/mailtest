<div class="flex flex-col min-h-screen">
    @include("livewire.sidebar.sidebar")

    <div class="relative md:min-h-[20px] md:h-16 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()" class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Edit Appointment</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="w-4/5 p-5 m-auto mt-10 h-3/4 min-w-[500px]">
        <x-card title="Edit Appointment Information" rounded="3xl" id="custom-shadow-x-card">
            <form wire:submit.prevent="saveEdit">
                <div>
                    <x-datetime-picker label="Appointment Date" placeholder="Appointment Date" wire:model.lazy="date_time" />
                </div>
                <div>
                    <x-select
                        label="Search a User"
                        wire:model="user_id"
                        placeholder="Select some user"
                        :async-data="route('patient.references')"
                        :template="[
                            'name'   => 'user-option',
                            'config' => ['src' => 'profile_photo']
                        ]"
                        option-label="last_name"
                        option-value="user_id"
                        option-description="first_name"
                    />
                </div>
                <div class="flex flex-row pt-3 gap-x-3">
                    <x-select class="mb-3" label="Select Services" wire:model.lazy="service_id" multiselect
                        placeholder="Select services" :async-data="route('service.references')" option-label="name"
                        option-description="price" option-value="id" />
                </div>
                <div>
                    <x-textarea label="Concern" placeholder="Describe your dental health concern" wire:model.defer='concern' />
                </div>
                <x-slot name="footer" class="flex items-center justify-between">
                    <div class="justify-end">
                        <x-button class="outline" label="Cancel" flat href="{{ route('appointment.index') }}" target="_self" />
                        <x-button indigo label="Save" wire:click='saveConfirmation' wire:loading.attr="disabled" />
                    </div>
                </x-slot>
            </form>
        </x-card>
    </div>
</div>
