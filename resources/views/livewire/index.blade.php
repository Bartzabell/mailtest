<div class="w-full">
    @include('layout.header-nav')


    <div id="home" class="overflow-hidden">
        <div class="flex items-center justify-center">

            {{-- Carousel Slider Start --}}
            <div id="slider-1" class="w-full">
                <div class="h-screen px-10 py-24 text-black bg-cover"
                    style="background-image: url('/img/bgdental.jpg')">
                    <div class="md:w-1/2">
                        <h1 class="pl-20 mb-3 font-sans text-6xl text-white pt-14"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Hugo-Foronda<br>Dental Clinic</h1>
                        <p class="pl-20 mb-4 font-sans text-2xl text-white"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Welcome to Hugo-Foronda Dental Clinic,<br>
                            conveniently located at the heart of <br>
                            Carmona, Cavite.</p>
                        <div class="pl-20">
                            <a href="{{ route('register') }}">
                                <button class="relative py-2 px-8 text-black text-base overflow-hidden bg-white transition-all duration-400 ease-in-out shadow-md hover:scale-105 hover:text-white hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#4BAEA8] before:to-[#89fff3] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] hover:before:left-0">
                                    Set an Appointment
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div id="slider-2" class="w-full">
                <div class="h-screen px-10 py-24 text-white bg-cover"
                    style="background-image: url('/img/schedental.jpg')">
                    <div class="md:w-1/2">
                        <h1 class="pl-20 mb-3 font-sans text-6xl text-white pt-14"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Hugo-Foronda<br>Dental Clinic</h1>
                        <p class="pl-20 mb-4 font-sans text-2xl text-white"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Welcome to Hugo-Foronda Dental Clinic,<br>
                            conveniently located at the heart of <br>
                            Carmona, Cavite.</p>
                        <div class="pl-20">
                            <a href="{{ route('register') }}">
                                <button class="relative py-2 px-8 text-black text-base overflow-hidden bg-white transition-all duration-400 ease-in-out shadow-md hover:scale-105 hover:text-white hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#4BAEA8] before:to-[#89fff3] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] hover:before:left-0">
                                    Set an Appointment
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div id="slider-3" class="w-full">
                <div class="h-screen px-10 py-24 text-white bg-cover"
                    style="background-image: url('/img/OSdental.jpg')">
                    <div class="md:w-1/2">
                        <h1 class="pl-20 mb-3 font-sans text-6xl text-white pt-14"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Hugo-Foronda<br>Dental Clinic</h1>
                        <p class="pl-20 mb-4 font-sans text-2xl text-white"
                            style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Welcome to Hugo-Foronda Dental Clinic,<br>
                            conveniently located at the heart of <br>
                            Carmona, Cavite.</p>
                        <div class="pl-20">
                            <a href="{{ route('register') }}">
                                <button class="relative py-2 px-8 text-black text-base rounded-[50px] overflow-hidden bg-white transition-all duration-400 ease-in-out shadow-md hover:scale-105 hover:text-white hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#4BAEA8] before:to-[#89fff3] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-[50px] hover:before:left-0">
                                    Set an Appointment
                                </button>
                            </a>
                        </div>
                    </div>
                </div> <!-- container -->
                <br>
            </div>
            {{-- Carousel Slider End --}}

        </div>
        {{-- slider buttons --}}
        <div class="flex justify-between w-12 pb-2 mx-auto">
            <button id="sButton1" onclick="sliderButton1()" class="w-2 p-2 m-2 bg-blue-500 rounded-full "></button>
            <button id="sButton2" onclick="sliderButton2()" class="w-2 p-2 m-2 bg-blue-500 rounded-full"></button>
            <button id="sButton3" onclick="sliderButton3()" class="w-2 p-2 m-2 bg-blue-500 rounded-full"></button>
        </div>


    {{-- Services --}}
    <div class="p-2">
        <h1 class="text-[#176B87] pl-10 font-sans text-6xl pt-7"><b>Services</b></h1>
        <h1 class="pl-10 mb-5 font-sans text-xl pt-7">At the Hugo-Foronda Dental Clinic,<br>
            we provide a range of services, including:</h1>
            @if ($services->isEmpty())
            @elseif ($services->count() > 0)
                <section class="flex justify-center space-x-4">
                    <header id="services"></header>
                    @foreach ($services as $service)
                    <div class="p-5">
                        <div class="p-8 shadow-lg w-60 h-96">
                            <h2 class="font-bold text-center text-blue-800">{{ $service->name }}</h2>
                            <div class="text-center">{{ $service->content }}</div>
                        </div>
                    </div>
                    @endforeach
                </section>
            @endif
    </div>



    {{-- about --}}
    <div class="bg-cover"
    style="background-image: url('/img/skulldental1.jpg')">
    <div class="w-full bg-cover" style="background-image: url('/img/aboutus.png'); height: 100%;">
        <h1 class="text-[#04364A] pl-20 font-sans text-6xl pb-20 pt-7"><b>
            About<br>Us<br>
        </b></h1>
    @if ($abouts->isEmpty())
    @elseif ($abouts->count() > 0)
        <section>
                @foreach ($abouts as $about)
                <div class="pb-4 pl-20">
                    <h2 class="font-sans text-2xl text-white">
                        <span class="px-2 pt-3 bg-[#5DC6C2] rounded-tl-lg rounded-tr-lg">{{ $about->name }}</span><br>
                        <span class="px-2 pb-3 bg-[#5DC6C2] rounded-tr-lg rounded-bl-lg rounded-br-lg">{{ $about->content }}</span>
                    </h2>
                </div>
                @endforeach
        </section>
    @endif
    </div>
    </div>


    @include('layout.footer-nav')
</div>

<script>
    let currentSlide = 0;

    function showSlide(index) {
        const items = document.querySelectorAll('[data-carousel-item]');
        items.forEach((item, i) => {
            item.style.opacity = i === index ? 1 : 0;
        });

        const buttons = document.querySelectorAll('[data-carousel-slide-to]');
        buttons.forEach((button, i) => {
            button.setAttribute('aria-current', i === index);
            button.style.backgroundColor = i === index ? 'black' :
                'white'; // Change color based on active slide
        });
    }

    function navigateToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + 10) % 10;
        showSlide(currentSlide);
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % 10;
        showSlide(currentSlide);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('[data-carousel-slide-to]');
        buttons.forEach((button, index) => {
            button.addEventListener('click', function() {
                navigateToSlide(index);
            });
        });
        // Automatically change slide every 30 seconds
        setInterval(function() {
            nextSlide();
        }, 5000); // 30 seconds in milliseconds
    });

</script>
