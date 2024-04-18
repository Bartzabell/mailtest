<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="" type="image/svg+xml" sizes="any">
    <wireui:scripts />
    @vite('resources/css/app.css')
    @livewireStyles
    {{-- @livewireScripts --}}
    {{-- <script src="resources\js\app.js" defer></script> --}}
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="relative flex flex-col items-center justify-center min-h-screen py-6 overflow-hidden bg-white sm:py-12">
        <h2 class="mb-2 text-[42px] font-bold text-zinc-800">Verify Email</h2>
        <p class="mb-2 text-lg text-zinc-500">Before continuing, please verify your email address by clicking on the link we just emailed to you. If you didn't receive the email, we can
        <a href="{{ route('verification.send') }}">resend</a> it.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- https://play.tailwindcss.com/PLrIiZQn2n -->

    {{-- <div class="relative flex flex-col items-center justify-center min-h-screen py-6 overflow-hidden bg-white sm:py-12">
        <div class="max-w-xl px-5 text-center">
          <h2 class="mb-2 text-[42px] font-bold text-zinc-800">Check your inbox</h2>
          <p class="mb-2 text-lg text-zinc-500">We are glad, that you’re with us ? We’ve sent you a verification link to the email address <span class="font-medium text-indigo-500">mail@yourdomain.com</span>.</p>
          <a href="/login" class="inline-block px-5 py-3 mt-3 font-medium text-white bg-indigo-600 rounded shadow-md w-96 shadow-indigo-500/20 hover:bg-indigo-700">Open the App →</a>
        </div>
      </div> --}}


</body>
</html>
