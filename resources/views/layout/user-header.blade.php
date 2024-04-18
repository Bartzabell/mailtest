<nav class="hidden md:min-h-[20px] px-3 md:h-16 md:flex md:justify-around md:sticky md:top-0 md:z-50 md:bg-slate-800">
    <div class="flex items-center flex-shrink-0 mr-6 text-white">
        <svg class="w-8 h-8 mr-2 fill-current" width="54" height="54" viewBox="0 0 24.00 24.00" xmlns="http://www.w3.org/2000/svg"
        fill="#a86161" stroke="#a86161"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-miterlimit:10;stroke-width:0.9600000000000002;}</style> </defs> <g id="dental"> <path class="cls-1" d="M1.5,8.18A6.68,6.68,0,0,1,12,2.7"></path> <path class="cls-1" d="M22.5,8.18A6.69,6.69,0,0,0,9.78,5.31"></path> <path class="cls-1" d="M22.5,8.18V9.6a17.35,17.35,0,0,1-1.32,6.63,17.27,17.27,0,0,1-3.75,5.61,2.25,2.25,0,0,1-3.82-1.25L13,16.54a1,1,0,0,0-2,0l-.62,4.05a2.25,2.25,0,0,1-3.82,1.25A17.27,17.27,0,0,1,1.5,9.6V8.18"></path> <line class="cls-1" x1="12" y1="8.18" x2="19.64" y2="8.18"></line> <line class="cls-1" x1="15.82" y1="4.36" x2="15.82" y2="12"></line> </g> </g></svg>
      <span class="text-xl font-semibold tracking-tight">Dental Clinic</span>
    </div>

    <div class="flex-grow block w-full lg:flex lg:items-center lg:w-auto">
      <div class="inline-block text-sm lg:flex-grow">
      </div>
      <div>
        <a href="#home" class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0 hover:text-gray-400">
            Home
          </a>
        <a href="#services" class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0 hover:text-gray-400">
            Services
          </a>
          <a href="#about" class="block mt-4 mr-4 text-white lg:inline-block lg:mt-0 hover:text-gray-400">
            About
          </a>
          <a href="#contact" class="block mt-4 text-white mr-9 lg:inline-block lg:mt-0 hover:text-gray-400">
            Contact
          </a>
        <a href="/login"
        class="inline-block px-4 py-2 mt-4 text-sm leading-none text-white border border-white rounded hover:border-transparent hover:text-gray-500 hover:bg-white lg:mt-0">
            Login</a>

            {{-- Temporary admin button --}}
      <x-button outline zinc label="Admin" class="ml-3" href="{{route('dashboard.index')}}" target="_self"/>
      </div>
    </div>
  </nav>
