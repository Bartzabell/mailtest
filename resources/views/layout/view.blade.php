<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script> --}}
    <title>Dental Clinic</title>

    <wireui:scripts />
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <x-dialog z-index="z-50" blur="md" align="center" />

    <div>
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>
