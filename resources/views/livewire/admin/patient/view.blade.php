<div class="flex flex-col min-h-screen">
    @include('layout.sidechart')
    @include('livewire.sidebar.sidebar')
    <div class="relative md:min-h-[20px] md:h-20 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white mb-8">
        <a href="javascript:history.back()"
            class="relative z-10 ml-16 font-semibold tracking-tight text-gray-700 text-xl2 hover:scale-150">
            <svg class="w-8 h-8 text-black transform rotate-180" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <h1 class="relative z-10 ml-3 text-xl font-semibold tracking-tight text-gray-700">Patient Records > View</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="flex flex-row">
        <div class="mx-auto">
            <div class="flex flex-col max-w-screen-lg bg-white shadow-md md:ml-7 md:flex-row lg:mr-12 lg:w-full">
                <div class="flex flex-col pl-10 pr-8 my-4 lg:px-5 lg:border-r lg:border-gray-300 lg:w-80 md:w-48">
                    <div
                        class="relative mx-auto mb-1 mr-5 overflow-hidden bg-white border-2 border-gray-200 rounded-full fill-black w-52 h-52 pr-7 md:w-32 md:h-32 lg:w-60 lg:h-60">
                        @if ($patientData->profile_picture)
                            <img class="absolute inset-0 object-cover w-full h-full"
                                src="{{ asset('/img/' . $patientData->profile_picture) }}" alt="User Image">
                        @else
                            @if (strtolower($patientData->sex) === 'male')
                                <svg class="absolute inset-0 w-full h-full mt-7 pr-7" fill="black"
                                    viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                                    <path xmlns="http://www.w3.org/2000/svg" fill="#010101" opacity="1.000000"
                                        stroke="none"
                                        d=" M450.775269,409.670929   C451.000000,414.689240 451.000000,419.378510 451.000000,424.533875   C449.451416,428.366089 447.125305,430.998413 444.128021,433.238953   C436.739197,438.762329 430.041656,445.158905 422.275391,450.782471   C291.645782,451.000000 161.291550,451.000000 30.468658,451.000000   C18.556170,444.261688 7.939327,436.630219 1.219221,424.276794   C1.000000,420.969391 1.000000,417.938812 1.000000,414.454102   C1.947003,406.762848 7.476069,402.473633 12.142188,398.017853   C22.318304,388.300568 34.265347,381.053650 47.031727,375.095337   C65.350937,366.545441 84.476707,360.563080 103.999046,355.403381   C114.498062,352.628540 125.027344,350.229370 135.706696,348.721893   C142.734436,347.729858 147.156433,343.694061 150.962357,338.645050   C153.830597,334.839996 156.492981,331.388367 161.435608,329.979248   C165.165329,328.915955 165.483383,325.929810 162.289093,323.172638   C157.377136,318.932892 152.260300,314.960541 147.947266,310.041779   C142.881699,304.264771 138.648758,297.981873 134.970779,291.242523   C128.054214,278.568909 124.268776,264.718323 119.597214,251.201981   C118.238007,247.269379 117.944702,243.049057 116.927017,239.007263   C116.433113,237.045731 115.608452,235.674561 113.462837,235.305481   C107.091179,234.209518 102.914574,229.908264 100.500687,224.535568   C94.355537,210.857956 91.387817,196.400665 92.586372,181.345139   C93.105469,174.824615 95.185898,168.890152 102.024780,166.073608   C104.424110,165.085464 104.076019,163.083069 103.972298,161.001938   C103.665260,154.841965 102.046448,148.888443 101.411858,142.749222   C99.469666,123.959923 101.894249,105.625404 104.947678,87.190285   C107.240906,73.344948 111.584290,60.203316 118.435173,48.197048   C126.343819,34.337032 137.286850,23.291300 151.715057,15.396702   C172.723343,3.901732 195.079300,3.832887 217.808029,5.299075   C229.796448,6.072424 241.589569,8.344792 253.276108,11.119791   C254.917847,11.509628 256.574280,11.501410 258.239929,11.223337   C266.632538,9.822208 274.805664,11.249360 282.930511,13.193007   C285.200836,13.736128 287.485687,14.201088 289.775787,14.640764   C305.665344,17.691393 318.955536,25.610155 330.453094,36.686138   C333.799347,39.909687 336.524139,43.884319 338.826996,47.848583   C346.143555,60.443539 352.202301,73.612099 352.336639,88.616562   C352.453003,101.612457 352.715393,114.622658 352.253540,127.603294   C351.851837,138.895645 351.039673,150.192032 349.959351,161.451813   C349.720886,163.937378 349.529663,166.049713 352.281799,167.308548   C358.471039,170.139496 359.952942,175.702072 360.280701,181.766129   C360.542999,186.618881 359.768677,191.458420 358.757935,196.142151   C356.862183,204.926666 354.834747,213.770889 351.528625,222.105179   C349.047821,228.358902 345.693024,234.681122 337.396332,235.197418   C335.203308,235.333908 335.050507,237.335602 334.749908,238.921844   C333.227753,246.953354 330.574493,254.662415 328.386627,262.503326   C325.212891,273.877716 320.357666,284.459625 314.698669,294.557556   C307.837769,306.800079 299.019653,317.730621 286.654510,325.165253   C285.240906,326.015198 283.435852,326.765289 284.102203,328.885437   C284.662994,330.669678 286.480591,330.669617 287.905060,330.560089   C293.489929,330.130737 297.085419,332.779266 299.450134,337.572235   C299.817139,338.316162 300.377838,338.958130 300.795105,339.676575   C304.161621,345.472504 308.705322,348.643097 315.827454,349.438019   C333.925781,351.458069 351.346436,356.996735 368.726471,362.083649   C383.523346,366.414551 398.080475,371.936005 411.899719,379.009857   C425.276978,385.857391 437.854828,393.860748 448.162628,405.027069   C449.351410,406.314911 449.933167,407.806335 450.775269,409.670929  z" />
                                </svg>
                            @elseif(strtolower($patientData->sex) === 'female')
                                <svg class="absolute inset-0 w-full h-full mt-7 pr-7" fill="black"
                                    viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                                    <path xmlns="http://www.w3.org/2000/svg" fill="#000000" opacity="1.000000"
                                        stroke="none"
                                        d=" M444.236633,450.679932   C299.645782,451.000000 155.291550,451.000000 10.468657,451.000000   C7.823863,447.944946 9.635718,445.171631 10.860841,442.563232   C16.225710,431.141083 24.608841,422.241943 34.549656,414.654205   C53.023918,400.552979 73.708847,390.670715 95.423096,382.808685   C105.756866,379.067139 116.148132,375.485352 126.813759,372.704651   C134.422440,370.720978 135.854736,364.333710 130.298569,358.775513   C128.988892,357.465424 127.543480,356.338806 125.776421,355.725098   C103.419586,347.960266 88.760010,332.001648 78.960625,311.157471   C71.510765,295.310974 68.128952,278.442902 66.531235,261.000336   C63.423248,227.069901 68.979591,193.931503 74.367599,160.718292   C78.362701,136.091370 84.993576,112.205513 94.774033,89.278755   C106.656540,61.424480 122.173195,36.115726 148.723953,19.700243   C165.893341,9.084965 184.716217,4.373081 205.045517,6.404676   C209.692886,6.869107 214.322174,7.293313 218.891449,8.277871   C221.733612,8.890279 224.500168,8.513908 227.266098,7.662339   C242.712219,2.906811 258.465881,2.260812 274.189087,5.450593   C301.682495,11.028203 322.538361,26.727686 338.957001,49.024883   C357.279724,73.907967 367.520416,102.288025 375.418579,131.740891   C381.693695,155.141464 385.568390,178.987320 387.922485,203.041412   C389.329834,217.422043 390.082855,231.868149 388.671570,246.410965   C387.689758,256.528107 386.781464,266.638611 385.088318,276.652924   C381.482483,297.980042 374.456390,317.918243 360.678528,335.008911   C352.417023,345.256836 341.940796,352.394653 329.680511,357.003723   C327.496887,357.824615 325.241852,358.465149 323.489899,360.136475   C318.993591,364.425873 319.869568,369.533508 325.783020,371.151093   C336.747253,374.150269 347.298157,378.255005 357.841614,382.394531   C381.513641,391.688629 404.212677,402.767365 424.001801,419.076416   C431.957916,425.633392 438.323792,433.472992 442.806915,442.771790   C443.942017,445.126129 445.409943,447.506653 444.236633,450.679932  z" />
                                </svg>
                            @endif
                        @endif
                    </div>

                    <div class="w-full px-2 my-1 text-lg text-center text-gray-500">{{ $patientData->last_name }},
                        {{ $patientData->first_name }} {{ $patientData->middle_name }}.
                        {{ $patientData->extension_name }}</div>
                    <button
                        class="w-32 h-8 mx-auto text-white rounded-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105">
                        <a href="{{ route('patient.edit', ['user' => $user->id]) }}">
                            <div class="flex flex-row items-center ml-3">Edit Profile
                                <svg class="px-2 fill-white hover:fill-black" xmlns="http://www.w3.org/2000/svg"
                                    height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                            </div>
                        </a>
                    </button>
                </div>

                <hr class="mx-2 my-3 lg:hidden">

                <div class="flex flex-col h-full">
                    <div class="flex flex-col px-5 py-2 lg:py-12 md:flex-row">
                        {{-- Date of Birth --}}
                        <div class="flex flex-col w-full md:mb-0 md:w-48 lg:w-52 lg:pr-7">
                            <label class="flex items-center text-sm">Birthdate:</label>
                            <div class="h-auto text-gray-500">
                                {{ Carbon\Carbon::parse($patientData->birthdate)->format('F d, Y') }}</div>
                        </div>

                        {{-- Age --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-40 md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">Age:</label>
                            <div class="text-gray-500">
                                {{ Carbon\Carbon::parse($patientData->birthdate)->diff(Carbon\Carbon::now())->format('%y years') }}
                            </div>
                        </div>

                        {{-- Sex --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-28">
                            <label class="flex items-center text-sm">Sex:</label>
                            <div class="text-gray-500">{{ $patientData->sex }}</div>
                        </div>
                    </div>

                    <hr class="mx-2 my-3">

                    <div class="flex flex-col px-5 py-2 lg:py-12 md:flex-row">
                        {{-- Barangay --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-52 md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">Barangay:</label>
                            <div class="h-auto text-gray-500">{{ $barangay->barangay_description }}</div>
                        </div>
                        {{-- City --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-40 md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">City:</label>
                            <div class="text-gray-500">{{ $city->city_municipality_description }}</div>
                        </div>
                        {{-- Province --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-28 md:mb-0">
                            <label class="flex items-center text-sm">Province:</label>
                            <div class="text-gray-500">{{ $province->province_description }}</div>
                        </div>
                    </div>

                    <hr class="mx-2 my-3">

                    <div class="flex flex-col px-5 py-2 lg:py-12 md:flex-row">
                        {{-- Email --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-1/2 md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">Email:</label>
                            <div class="h-auto text-gray-500">{{ $user->email }}</div>
                        </div>
                        {{-- Phone Number --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-1/2 md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">Contact Number:</label>
                            <div class="text-gray-500">{{ $patientData->phone_number }}</div>
                        </div>

                    </div>

                    <hr class="mx-2 my-3">

                    <div class="flex flex-col px-5 py-2 lg:py-12 md:flex-row">
                        {{-- Existing Medical Condition --}}
                        <div class="flex flex-col w-full md:w-48 lg:w-full md:mb-0 lg:pr-7">
                            <label class="flex items-center text-sm">Existing Medical Condition:</label>
                            <div class="h-auto text-gray-500">{{ $patientData->existing_medical_condition }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="mx-auto mt-12">
    <div class="bg-white md:ml-0">
        <h1 class="py-2 text-3xl ml-44">Tooth Chart</h1>
        <hr class="mx-2">
        @include('layout.tooth-chart')
         @include('layout.child-tooth-chart')
    </div>
    </div> --}}

    {{-- Record List --}}
    <div class="w-5/6 mx-auto my-5">
        <div class="flex flex-row mx-auto mb-7">
            <h2 class="relative z-10 ml-12 text-xl font-semibold tracking-tight text-gray-700 underline lg:ml-0">
                Treatment History
            </h2>
            <x-button
                class="ml-12 text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                icon="plus" label="Add" wire:click='viewAddRecord' />
        </div>
        {{-- Shows add record when empty --}}
        @if ($sortedRecords->isEmpty() && !$addPatientRecord)
            <div class="mt-5 text-center">
                <p class="py-2 m-20 text-gray-500">No Treatment History</p>
                @if ($addPatientRecord == 0)
                @endif
            </div>

            @if ($addPatientRecord == 1)
                <div>
                    <div class="p-6 m-auto mt-3 mb-4 text-base bg-white rounded-lg ">
                        <div>
                            <x-select label="Attending Dentist" wire:model.defer="dentistId"
                                placeholder="Select some user" :async-data="route('doctor.references')" option-label="last_name"
                                option-description="first_name" option-value="id" />
                        </div>
                        <div>
                            <x-datetime-picker label="Date and Time Rendered" placeholder="Select Date and Time"
                                wire:model.defer="dateTimeRendered" :max="now()" />
                        </div>
                        <div class="flex flex-row pt-3 gap-x-3">
                            <x-select class="mb-3" label="Services Rendered" wire:model.lazy="servicesId"
                                multiselect placeholder="Select services" :async-data="route('service.references')" option-label="name"
                                option-description="price" option-value="id" />

                            <x-button
                                class="ml-12 text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                                label="Add Services Details" icon="plus" wire:click='viewAddServiceDetail' />
                        </div>

                        @if ($addServiceDetail == 1)

                            @foreach ($allServices as $service)
                                <div class="p-3 shadow-md hover:shadow-lg">
                                    <div class="flex gap-3">
                                        <p>{{ $service->name }}</p>
                                        <p>Cost: {{ $service->price }}</p>
                                    </div>

                                    <x-textarea class="p-3" wire:model="remark" label="Remark"
                                        placeholder="Insert remark here" />

                                    <label for="dropzone-file"
                                        class="flex m-2 text-gray-500 icons dark:hover:bg-bray-800 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="columns-2">
                                            <svg class="p-1 mr-2 border rounded-full cursor-pointer hover:text-gray-700 h-7"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                            {{-- <p class="p-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop.</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> --}}
                                            @if ($image)
                                                <div class="bg-gray-900 rounded-md ">
                                                    <img src="{{ $image->temporaryUrl() }}"
                                                        class="bg-white max-h-20">
                                                </div>
                                            @endif
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" wire:model="image"
                                            accept="image/*" style="display:none;" />
                                    </label>

                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-5">
                        <x-button
                            class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                            label="Save" wire:click='saveRecord' />
                        <x-button
                            class="text-black rounded-lg shadow-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-400 hover:text-gray hover:scale-105"
                            label="Cancel" wire:click='cancel' />
                    </div>
                </div>
            @endif
        @else
            @if ($addPatientRecord == 1)
                <div>
                    <div class="p-6 m-auto mt-3 mb-6 text-base bg-white rounded-lg ">
                        <div class="mb-3">
                            <x-select label="Attending Dentist" wire:model.defer="dentistId"
                                placeholder="Select some user" :async-data="route('doctor.references')" option-label="last_name"
                                option-description="first_name" option-value="id" />
                        </div>
                        <div>
                            <x-datetime-picker class="py-2 pl-3" label="Date and Time Rendered"
                                placeholder="Select Date and Time" wire:model.defer="dateTimeRendered"
                                :max="now()" />
                        </div>
                        <div class="flex flex-row pt-3 gap-x-3">
                            <x-select class="mb-3" label="Services Rendered" wire:model.lazy="servicesId"
                                multiselect placeholder="Select services" :async-data="route('service.references')" option-label="name"
                                option-description="price" option-value="id" />

                            <x-button outline indigo label="Add Services Details" icon="plus"
                                wire:click='viewAddServiceDetail' />
                        </div>

                        @if ($addServiceDetail == 1)

                            @foreach ($allServices as $service)
                                <div class="p-3 shadow-md hover:shadow-lg">
                                    <div class="flex gap-3">
                                        <p>{{ $service->name }}</p>
                                        <p>Cost: {{ $service->price }}</p>
                                    </div>

                                    <x-textarea class="p-3" wire:model="remark" label="Remark"
                                        placeholder="Insert remark here" />

                                    <label for="dropzone-file"
                                        class="flex m-2 text-gray-500 icons dark:hover:bg-bray-800 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="columns-2">
                                            <svg class="p-1 mr-2 border rounded-full cursor-pointer hover:text-gray-700 h-7"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                            {{-- <p class="p-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop.</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> --}}
                                            @if ($image)
                                                <div class="bg-gray-900 rounded-md ">
                                                    <img src="{{ $image->temporaryUrl() }}"
                                                        class="bg-white max-h-20">
                                                </div>
                                            @endif
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" wire:model="image"
                                            accept="image/*" style="display:none;" />
                                    </label>

                                </div>
                            @endforeach
                        @endif



                        {{-- @if ($servicePanels == null)
                            <div>empty $servicePanels
                            </div>
                        @else
                            <div>not empty $servicePanels</div>
                            {{-- @foreach ($servicePanels as $panel)
                                <div>
                                    $serviceId
                                </div>
                            @endforeach --}}
                        {{-- @endif --}}


                    </div>




                    <div class="mt-5">
                        <x-button
                            class="text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-700 via-blue to-blue-300 hover:text-black hover:scale-105"
                            label="Save" wire:click='saveRecord' />
                        <x-button
                            class="text-black rounded-lg shadow-lg bg-gradient-to-r from-gray-100 via-gray-200 to-gray-400 hover:text-gray hover:scale-105"
                            label="Cancel" wire:click='cancel' />
                    </div>
                </div>
            @endif

            @foreach ($sortedRecords as $record)
                <div
                    class="w-1/2 p-5 mt-4 ml-12 bg-white border-2 border-black shadow-md lg:ml-0 rounded-xl hover:shadow-lg">
                    {{-- date rendered --}}
                    <div class="flex flex-col gap-3">
                        @if ($record->pdrDetail->isnotEmpty())
                            <p class="text-sm text-gray-500 md:text-base">
                                {{ Carbon\Carbon::parse($record->pdrDetail[0]->date_time_rendered)->format('F d, Y H:i A') }}
                            </p>
                        @else
                            <p class="text-sm text-gray-500 md:text-base">No detail available for this record</p>
                        @endif

                        {{-- dentist --}}
                        @if ($record->dentistData->count() > 0)
                            <p class="text-sm text-gray-500 md:text-base">Dr. {{ $record->dentistData->last_name }}
                            </p>
                        @else
                            <p class="text-sm text-gray-500 md:text-base">No dentist data available for this record</p>
                        @endif
                        @if ($record->pdrDetail->isNotEmpty())
                            {{-- <p>Rendered Services:</p> --}}
                            @foreach ($record->pdrDetail as $detail)
                                @php
                                    $decodedDetail = json_decode($detail);
                                @endphp
                                <p>Service: {{ App\Models\Service::where('id', $decodedDetail->service_id)->value('name') }}</p>
                                <p>Doctors Remark: {{ App\Models\PdrDetail::where('pdr_id', $record->id)->value('doctors_remark') }}</p>
                                <!-- Add more properties as needed -->

                                <p>Service Fee: Php {{ $decodedDetail->price }}</p>
                                <hr>
                            @endforeach
                            <p>Total: {{ $record->total_bill }}</p>
                        @else
                            <p class="text-sm text-gray-500 md:text-base">No PDR Detail available for this record</p>
                        @endif
                    </div>

                    {{-- @if ($record->pdrDetail->isnotEmpty())
                        <p>Rendered Services:</p>
                        @foreach ($record->pdrDetail as $detail)
                            <p>{{ optional($detail->services)->name ?? 'Service not available' }}</p>
                        @endforeach
                    @else
                        <p>No PDR Detail available for this record</p>
                    @endif --}}

                </div>
            @endforeach
        @endif

    </div>
    @include('layout.footer-nav')
</div>
