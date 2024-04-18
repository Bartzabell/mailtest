{{--<footer class="mt-auto">
    <nav class="bg-[#2299dd]">
        <div class="flex flex-col items-center justify-end w-full h-full max-w-screen-xl p-4 mx-auto md:flex md:items-center md:justify-between">
            <div class="md:flex md:items-center">
                <!-- Left Column (Logo and Name) -->
                <div class="md:mr-6">
                    <img src="" alt="Logo" class="w-auto h-12">
                    <span class="text-lg text-black dark:text-black">Hugo-Foronda Dental Clinic</span>
                </div>

                <!-- Right Column (Contact Information) -->
                <div class="mt-4 text-sm text-black dark:text-black">
                    <p style="font-size: 1.5em; margin-bottom: 0.5em;">CONTACT US</p>
                    <p>Email: admin@exampl.net</p>
                    <p>Phone: 09123456789</p>
                    <br>

                    <!-- Get Direction Link -->
                    <p style="font-size: 1.5em; margin-bottom: 0.5em;"><a href="https://maps.app.goo.gl/TQKb61rYY3S8KT73A" target="_blank" class="text-black hover:underline">GET DIRECTIONS</a></p>
                    <p style="font-size: 1.2em;">Unit 6 Estrellita Bldg Loyola St. <br> Brgy. Maduya, Carmona City 4116 <br>  Cavite, Philippines </p>
                </div>
            </div>

            <!-- All Rights Reserved -->
            <span class="mt-4 text-sm text-center text-black dark:text-black">© 2023 <a href="http://dental-clinic.test" class="hover:underline">Hugo-Foronda Dental Clinic</a>. All Rights Reserved.</span>
        </div>
    </nav>
</footer>--}}

<!-- resources/views/includes/footer.nav.blade.php -->

@if(Auth::check() && Auth::user()->role === 'admin')
<footer class="mt-auto">
    <nav class="bg-[#7E8279]">
        <div class="flex flex-col items-center justify-end w-full h-full max-w-screen-xl p-2 mx-auto md:flex md:items-center md:justify-between">
        <span class="mt-4 text-sm text-center text-black dark:text-black">© 2023 <a href="http://dental-clinic.test" class="text-black hover:underline hover:text-black">Hugo-Foronda Dental Clinic</a>. All Rights Reserved.</span>
    </div>
    </nav>
</footer>
@else
<footer class="mt-auto">
    <nav class="bg-[#04364A]">
        <div class="flex flex-col items-center justify-center py-4 mx-20 lg:items-center lg:flex-row lg:justify-between">
            <div class="flex flex-row my-auto">
                <img class="w-28 h-28" src="{{ asset('/img/logonew.png') }}">
                <span class="pt-4 ml-2 text-lg text-black dark:text-black">
                    <a href="http://dental-clinic.test" class="font-sans text-white hover:underline">Hugo-Foronda Dental Clinic.</a><br>
                <span class="font-sans text-sm text-white"> © 2023 All Rights Reserved. </span>
                </span>
            </div>
            <div class="flex flex-col my-7 lg:my-0">
                <p style="font-size: 1.5em; margin-bottom: 0.5em;" class="font-sans text-white">CONTACT US</p>
                <div class="flex flex-row">
                    <svg class="w-7 h-7 fill-white" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                        <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                    </svg>
                <span class="ml-2 font-sans text-lg text-white">
                    Email: <br>
                <span class="text-sm">admin@exampl.net</span>
                </span>
                </div>
                <div class="flex flex-row">
                    <svg class="w-7 h-7 fill-white" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                <span class="ml-2 font-sans text-lg text-white">
                    Phone: <br>
                <span class="text-sm">09123456789</span>
                </span>
                </div>
            </div>
            <div class="flex flex-col">
                <p style="font-size: 1.5em; margin-bottom: 0.5em;"><a href="https://maps.app.goo.gl/TQKb61rYY3S8KT73A" target="_blank" class="font-sans text-white hover:underline">GET DIRECTIONS</a></p>
                <div class="flex flex-row">
                    <svg class="w-7 h-7 fill-white" xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                <span class="ml-2 font-sans text-lg text-white">
                    Unit 6 Estrellita Bldg Loyola St. <br> Brgy. Maduya, Carmona City 4116 <br>  Cavite, Philippines
                </span>
                </div>
            </div>
        </div>
    </nav>
</footer>
@endif
