<div>
    @include('layout.header-nav')
        <div class="flex items-center justify-center h-screen bg-center bg-cover"
        style="background-image: url('/img/bgdental.jpg')">
        <div class="absolute inset-0 bg-white opacity-50"></div>

                    <div class="z-50 flex mx-auto mt-16 bg-white shadow-xl"
                        style="width: 700px">
                        <div class="flex flex-row w-full h-full">
                            <div class="w-full">
                                    <div id="form-signin" class="w-full px-12 shadow-lg backdrop-blur-md">
                                        <div class="pr-4 mr-72">
                                            <a href="javascript:history.back()"
                                                class="relative z-10 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
                                                <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="flex flex-col gap-3 md:flex-row">
                                            <div class="pr-4 w-1/8">
                                                <h1 class="text-sm font-semibold text-left text-gray-400">Role</h1>
                                                <div class="flex gap-3 py-1">
                                                    <x-radio id="myself" label="For Myself" wire:model.defer="role" value="myself" />
                                                    <x-radio id="child" label="For My Child" wire:model.defer="role" value="child" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <div class="flex mb-1 gap-x-5">
                                                <x-input class="px-2" label="Last Name" placeholder="Last Name"
                                                    wire:model.defer='lastName' />
                                                <x-input class="px-2" label="First Name" placeholder="First Name"
                                                    wire:model.defer='firstName' />

                                            </div>
                                            <div class="flex flex-col gap-3 mb-1 md:flex-row">
                                                <x-input class="px-2" label="Middle Name" placeholder="Middle Name"
                                                    wire:model.defer='middleName' />
                                                <x-input class="px-2" label="Extension Name" placeholder="Extension Name"
                                                    wire:model.defer='extensionName' />
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-3 md:flex-row">
                                            <div class="w-1/2 pr-4">
                                                <x-datetime-picker label="Birthdate" class="px-2" placeholder="Date of birth"
                                                    :min="now()->subDays(36500)" :max="now()" display-format="MMMM DD, YYYY" without-time
                                                    wire:model.lazy="birthdate" />
                                            </div>
                                            {{-- <div class="pr-4 w-1/8">
                                                <h1 class="text-sm font-semibold text-left text-gray-400">Age</h1>
                                                <p class="w-full min-w-[70px] pt-2 mt-1 border rounded-md shadow-sm h-10">
                                                    {{ $age }}</p>
                                            </div> --}}
                                            <div class="pr-4 w-1/8">
                                                <h1 class="text-sm font-semibold text-left text-gray-400">Sex</h1>
                                                <div class="flex gap-3 px-3">
                                                    <x-radio id="female" label="Female" wire:model.defer="sex" value="female" />
                                                    <x-radio id="male" label="Male" wire:model.defer="sex" value="male" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-3 md:flex-row">
                                            <x-input class="w-1/2 px-2" label="Email" placeholder="your email" wire:model.defer="email" />

                                            <x-inputs.phone class="px-2" label="Contact Number" mask="#### ### ####"
                                                wire:model.defer="phoneNumber" />
                                        </div>

                                        <div class="flex flex-col gap-3 mb-1 md:flex-row">
                                            <div class="w-full md:w-1/3">
                                                <x-select id="adminProvince" class="px-2" label="*Province" wire:model.lazy="provinceId"
                                                    placeholder="Select Province" :async-data="route('province.references')" option-label="province_description"
                                                    option-value="id" />
                                            </div>
                                            <div class="w-full md:w-1/3">
                                                <x-select id="adminCity" class="px-2" label="*City" wire:model.lazy="cityId"
                                                    placeholder="Select City" :async-data="route('city.references')" option-label="city_municipality_description"
                                                    option-value="id" />
                                            </div>
                                            <div class="w-full md:w-1/3">
                                                <x-select id="adminBarangay" class="px-2" label="*Barangay" wire:model.lazy="barangayId"
                                                    placeholder="Select Barangay" :async-data="route('barangay.references')" option-label="barangay_description"
                                                    option-value="id" />
                                            </div>
                                        </div>

                                        <div class="w-full">
                                            <x-select class="mb-1" label="Medical Condition" placeholder="Select all that applies" multiselect
                                                wire:model.lazy='existingMedicalCondition' :options="['Diabetes', 'Hypertension', 'High Blood Pressure', 'Thyroid Abnormalities']" wire:model.defer="model" />
                                                <x-input class="w-1/2 px-2 mb-3" label="Other:" wire:model.laxy="otherExistingMedicalCondition" />
                                        </div>

                                        <div>
                                            <x-inputs.password class="px-2" label="Password" wire:model.lazy="password" />
                                            <p>password will be the last name when left empty</p>
                                        </div>

                                        <div class="flex flex-col items-center justify-center px-2">
                                            <x-button class="text-white rounded-md px-7 bg-slate-700 hover:bg-slate-800"
                                                wire:click='createPatient'>Next</x-button>

                                            <br>
                                            <h3>Already have an account?
                                                <a href="{{ route('login') }}"><button
                                                        class="p-2 px-3 text-white rounded-md bg-slate-700 hover:bg-slate-800">
                                                        Log in
                                                    </button>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
        </div>
</div>

<!-- JavaScript to toggle password visibility -->
