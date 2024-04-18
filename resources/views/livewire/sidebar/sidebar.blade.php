<div>
    <section class="body bg-white dark:bg-[#0F172A]">
        <aside
            class="w-60 -translate-x-48 fixed top-0 transition transform ease-in-out duration-1000 z-50 flex h-screen bg-[#1E293B]" id="leftSidebar">
            <!-- open sidebar button -->
            <div
                class="left-max-toolbar translate-x-24 scale-x-0 w-full -right-2 transition transform ease-in duration-300 flex items-center justify-between border-4 border-black dark:border-[#0F172A] bg-[#1E293B]  absolute top-2 rounded-full h-12">
                <div class="flex items-center p-3 text-white bg-blue-500 rounded-full group">
                    <div class="mr-11 text-[12.2px] duration-300 ease-in-out transform">
                        Hugo-Foronda Dental Clinic
                    </div>
                </div>
            </div>

            <div onclick="openLeftNav()" type="button"
                class="cursor-pointer -right-2 transition transform ease-in-out duration-500 flex border-4 border-black dark:border-[#0F172A] bg-[#1E293B] dark:hover:bg-blue-500 hover:bg-red-500 absolute top-2 p-3 rounded-full text-white">
                <svg class="w-6 h-6 fill-current" width="24" height="24" viewBox="0 0 24.00 24.00"
                    xmlns="http://www.w3.org/2000/svg" fill="#a86161" stroke="#a86161">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #ffffff;
                                    stroke-miterlimit: 10;
                                    stroke-width: 0.96;
                                }
                            </style>
                        </defs>
                        <g id="dental">
                            <path class="cls-1" d="M1.5,8.18A6.68,6.68,0,0,1,12,2.7"></path>
                            <path class="cls-1" d="M22.5,8.18A6.69,6.69,0,0,0,9.78,5.31"></path>
                            <path class="cls-1"
                                d="M22.5,8.18V9.6a17.35,17.35,0,0,1-1.32,6.63,17.27,17.27,0,0,1-3.75,5.61,2.25,2.25,0,0,1-3.82-1.25L13,16.54a1,1,0,0,0-2,0l-.62,4.05a2.25,2.25,0,0,1-3.82,1.25A17.27,17.27,0,0,1,1.5,9.6V8.18">
                            </path>
                            <line class="cls-1" x1="12" y1="8.18" x2="19.64" y2="8.18"></line>
                            <line class="cls-1" x1="15.82" y1="4.36" x2="15.82" y2="12"></line>
                        </g>
                    </g>
                </svg>
            </div>

            <!-- MAX SIDEBAR-->
            <div type="button"
                class="cursor-pointer left-max hidden ml-5 text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]"
                id="leftMaxSidebar">

                <a href="{{ route('dashboard.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('dashboard.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" class="w-4 h-4 mr-3"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        Dashboard
                    </div>
                </a>

                <a href="{{ route('appointment.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('appointment.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                        Appointments
                    </div>
                </a>

                <a href="{{ route('patient.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('patient.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" class="w-4 h-4 mr-3"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M48 0C21.5 0 0 21.5 0 48V256H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v64H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v80c0 26.5 21.5 48 48 48H265.9c-6.3-10.2-9.9-22.2-9.9-35.1c0-46.9 25.8-87.8 64-109.2V271.8 48c0-26.5-21.5-48-48-48H48zM152 64h16c8.8 0 16 7.2 16 16v24h24c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16H184v24c0 8.8-7.2 16-16 16H152c-8.8 0-16-7.2-16-16V152H112c-8.8 0-16-7.2-16-16V120c0-8.8 7.2-16 16-16h24V80c0-8.8 7.2-16 16-16zM512 272a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM288 477.1c0 19.3 15.6 34.9 34.9 34.9H541.1c19.3 0 34.9-15.6 34.9-34.9c0-51.4-41.7-93.1-93.1-93.1H381.1c-51.4 0-93.1 41.7-93.1 93.1z" />
                        </svg>
                        Patient Records
                    </div>
                </a>

                <a href="{{ route('dentist.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('dentist.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3" height="16" width="14"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                        </svg>
                        Dentists
                    </div>
                </a>

                <a href="{{ route('services.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('services.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" class="w-4 h-4 mr-3"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M186.1 52.1C169.3 39.1 148.7 32 127.5 32C74.7 32 32 74.7 32 127.5v6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2l36.7 205.8c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C192.2 323.7 207 312 224 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5v-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" />
                        </svg>
                        Services
                    </div>
                </a>

                <a href="{{ route('admin.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('admin.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" class="w-4 h-4 mr-3"
                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                        User Accounts
                    </div>
                </a>

                <a href="{{ route('other-settings.index') }}">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 fill-white hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3
                        {{ request()->routeIs('other-settings.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" class="w-4 h-4 mr-3"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                        Other Settings
                    </div>
                </a>

                <a href="{{ route('logout') }}" id="logout-link"
                    onclick="confirmLogout(event)"document.getElementById('logout-form').submit();">
                    <div
                        class="hover:bg-gray-100 hover:fill-blue-500 hover:border-2 hover:border-black fixed bottom-5 hover:ml-4 w-full text-white hover:text-blue-500 bg-[#1E293B] p-2 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3" style="width: 220px">
                        <svg xmlns="http://www.w3.org/2000/svg" fill='none' viewBox="0 0 18 15" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                        </svg>Sign Out
                    </div>
                </a>
            </div>

            <!-- MINI SIDEBAR-->
            <div type="button" class="cursor-pointer left-mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">

                <a href="{{ route('dashboard.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('dashboard.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" class="w-4 h-4"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('appointment.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('appointment.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('patient.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('patient.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" class="w-4 h-4"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M48 0C21.5 0 0 21.5 0 48V256H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v64H144c8.8 0 16 7.2 16 16s-7.2 16-16 16H0v80c0 26.5 21.5 48 48 48H265.9c-6.3-10.2-9.9-22.2-9.9-35.1c0-46.9 25.8-87.8 64-109.2V271.8 48c0-26.5-21.5-48-48-48H48zM152 64h16c8.8 0 16 7.2 16 16v24h24c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16H184v24c0 8.8-7.2 16-16 16H152c-8.8 0-16-7.2-16-16V152H112c-8.8 0-16-7.2-16-16V120c0-8.8 7.2-16 16-16h24V80c0-8.8 7.2-16 16-16zM512 272a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM288 477.1c0 19.3 15.6 34.9 34.9 34.9H541.1c19.3 0 34.9-15.6 34.9-34.9c0-51.4-41.7-93.1-93.1-93.1H381.1c-51.4 0-93.1 41.7-93.1 93.1z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('dentist.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('dentist.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                            class="w-4 h-4 ml-1"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('services.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('services.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" class="w-4 h-4"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M186.1 52.1C169.3 39.1 148.7 32 127.5 32C74.7 32 32 74.7 32 127.5v6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2l36.7 205.8c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C192.2 323.7 207 312 224 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5v-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('admin.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('admin.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" class="w-4 h-4"
                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('other-settings.index') }}">
                    <div
                        class="hover:ml-4 justify-end pr-5 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex
                        {{ request()->routeIs('other-settings.index') ? 'bg-blue-500' : 'bg-[#1E293B]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" class="w-4 h-4"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                    </div>
                </a>

                <a href="{{ route('logout') }}" id="logout-link"
                    onclick="confirmLogout(event)document.getElementById('logout-form').submit();">
                    <div
                        class="fixed bottom-5 hover:ml-4 justify-end pr-5 hover:fill-blue-500 text-white hover:text-blue-500 w-full bg-[#1E293B] p-3 rounded-full transform ease-in-out duration-300 flex">

                        <svg xmlns="http://www.w3.org/2000/svg" fill='none' viewBox="0 0 18 15"
                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                        </svg>

                    </div>
                </a>
            </div>


        </aside>

    </section>
</div>
<script>
    const leftSidebar = document.querySelector("#leftSidebar");
    const leftMaxSidebar = document.querySelector(".left-max");
    const leftMiniSidebar = document.querySelector(".left-mini");
    const leftMaxToolbar = document.querySelector(".left-max-toolbar");



    function closeLeftNav() {
        leftSidebar.classList.add("-translate-x-48");
        leftSidebar.classList.remove("translate-x-none");
        leftMaxSidebar.classList.add("hidden");
        leftMaxSidebar.classList.remove("flex");
        leftMiniSidebar.classList.add("flex");
        leftMiniSidebar.classList.remove("hidden");
        leftMaxToolbar.classList.add("translate-x-24", "scale-x-0");
        leftMaxToolbar.classList.remove("translate-x-0");
    }

    function openLeftNav() {
        if (leftSidebar.classList.contains('-translate-x-48')) {
            // max left sidebar
            leftSidebar.classList.remove("-translate-x-48");
            leftSidebar.classList.add("translate-x-none");
            leftMaxSidebar.classList.remove("hidden");
            leftMaxSidebar.classList.add("flex");
            leftMiniSidebar.classList.remove("flex");
            leftMiniSidebar.classList.add("hidden");
            leftMaxToolbar.classList.add("translate-x-0");
            leftMaxToolbar.classList.remove("translate-x-24", "scale-x-0");
        } else {
            // mini left sidebar
            leftSidebar.classList.add("-translate-x-48");
            leftSidebar.classList.remove("translate-x-none");
            leftMaxSidebar.classList.add("hidden");
            leftMaxSidebar.classList.remove("flex");
            leftMiniSidebar.classList.add("flex");
            leftMiniSidebar.classList.remove("hidden");
            leftMaxToolbar.classList.add("translate-x-24", "scale-x-0");
            leftMaxToolbar.classList.remove("translate-x-0");
        }
    }


    // Add event listener to close the left sidebar when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideLeftSidebar = leftSidebar.contains(event.target);
        if (!isClickInsideLeftSidebar) {
            closeLeftNav();
        }
    });
</script>
