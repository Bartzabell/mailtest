<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script> --}}
    <title>Hugo-Foronda Dental Clinic</title>
    <link rel="icon" href="img/logonew.png" type="image/svg+xml" sizes="any">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js"> --}}
    {{-- <link rel="icon" href="../../public/img/main-logo-transparent.png" type="image/svg+xml" sizes="any"> --}}
    <wireui:scripts />
    @vite('resources/css/app.css')
    @livewireStyles
    {{-- @livewireScripts --}}
    {{-- <script src="resources\js\app.js" defer></script> --}}
</head>

<body class="font-sans antialiased bg-gray-100">
    {{ $slot }}
    <x-dialog z-index="z-50" blur="md" align="center" />
    @livewireScripts

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {

            setInterval(function () {
                Alpine.store('slide', (Alpine.store('slide') + 1) % Alpine.store('quotes').length);
            }, 2000);
        });

        // document.getElementById('logoutButton').addEventListener('click', function (event) {
        // event.preventDefault(); // Prevent the default behavior (redirecting) on button click

        // Display a confirmation dialog
        var confirmLogout = confirm('Are you sure you want to logout?');

        // If user confirms, proceed with the logout
        if (confirmLogout) {
            window.location.href = this.getAttribute('href');
        }
    });

    </script> --}}
    <script>
        var cont = 0;
        var xx; // Declare xx outside the function to make it accessible to all functions

        function loopSlider() {
            xx = setInterval(function() {
                switch (cont) {
                    case 0:
                        {
                            $("#slider-1").fadeOut(400);
                            $("#slider-2").delay(400).fadeIn(400);
                            $("#sButton1").removeClass("bg-blue-800");
                            $("#sButton2").addClass("bg-blue-800");
                            cont = 1;
                            break;
                        }
                    case 1:
                        {
                            $("#slider-2").fadeOut(400);
                            $("#slider-3").delay(400).fadeIn(400); // Add fadeIn for slider-3
                            $("#sButton2").removeClass("bg-blue-800");
                            $("#sButton3").addClass("bg-blue-800"); // Add active class for slider-3 button
                            cont = 2;
                            break;
                        }
                    case 2:
                        {
                            $("#slider-3").fadeOut(400);
                            $("#slider-1").delay(400).fadeIn(400); // Change to slider-1
                            $("#sButton3").removeClass("bg-blue-800");
                            $("#sButton1").addClass("bg-blue-800"); // Change to slider-1 button
                            cont = 0;
                            break;
                        }
                }
            }, 8000);
        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton1() {
            $("#slider-2, #slider-3").fadeOut(400); // Hide slider-3 if it's visible
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2, #sButton3").removeClass("bg-blue-800"); // Remove active class from other buttons
            $("#sButton1").addClass("bg-blue-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton2() {
            $("#slider-1, #slider-3").fadeOut(400); // Hide slider-3 if it's visible
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1, #sButton3").removeClass("bg-blue-800"); // Remove active class from other buttons
            $("#sButton2").addClass("bg-blue-800");
            reinitLoop(4000);
            cont = 1;
        }

        function sliderButton3() {
            $("#slider-1, #slider-2").fadeOut(400); // Hide slider-1 and slider-2 if they're visible
            $("#slider-3").delay(400).fadeIn(400);
            $("#sButton1, #sButton2").removeClass("bg-blue-800"); // Remove active class from other buttons
            $("#sButton3").addClass("bg-blue-800");
            reinitLoop(4000);
            cont = 2;
        }

        $(window).ready(function() {
            $("#slider-2, #slider-3").hide(); // Hide slider-2 and slider-3 initially
            $("#sButton1").addClass("bg-blue-800"); // Add active class for slider-1 button

            loopSlider();
        });
    </script>
    @auth
        <script type="text/javascript">

            $(document).ready(function () {
                var SITEURL = "{{ url('/') }}";
                var user_id = {{ auth()->user()->id }};

                /*------------------------------------------
                --------------------------------------------
                Get Site URL
                --------------------------------------------
                --------------------------------------------*/
                var SITEURL = "{{ url('/') }}";

                /*------------------------------------------
                --------------------------------------------
                CSRF Token Setup
                --------------------------------------------
                --------------------------------------------*/

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                /*------------------------------------------
                --------------------------------------------
                FullCalender JS Code
                --------------------------------------------
                --------------------------------------------*/
                var calendar = $('#fullcalendar').fullCalendar({
                                editable: true,
                                events: SITEURL + "/fullcalendar",
                                displayEventTime: false,
                                editable: true,
                                eventRender: function (event, element, view) {
                                    if (event.allDay === 'true') {
                                            event.allDay = true;
                                    } else {
                                            event.allDay = false;
                                    }
                                },
                                selectable: true,
                                selectHelper: true,
                                select: function (start, end, allDay) {
                                    var selectedDate = start.format("Y-MM-DD");
                                    if (user_id) {
                                        var startFormatted = start.format("Y-MM-DDTHH:mm:ss");
                                        var endFormatted = end.format("Y-MM-DDTHH:mm:ss");
                                        $.ajax({
                                            url: SITEURL + "/getAppointmentDetails",
                                            data: {
                                                date: selectedDate
                                            },
                                            type: "GET",
                                            success: function (data) {
                                                // Display appointment details
                                                var serviceNames = data.title;
                                                var appointmentDetails = "Service Name: " + serviceNames + "\n" +
                                                    "Start Time: " + startFormatted + "\n" +
                                                    "End Time: " + endFormatted + "\n" +
                                                    "Concern: " + data.concern;
                                                alert(appointmentDetails);
                                            },
                                            error: function (error) {
                                                console.log(error);
                                                alert("Error fetching appointment details");
                                            }
                                        });
                                    }
                                },
                                eventClick: function (event) {
                                    // Add an AJAX request to fetch appointment details and display them
                                    $.ajax({
                                        url: SITEURL + "/fullcalendarAjax?type=getAppointmentDetails",
                                        data: {
                                            id: event.id
                                        },
                                        type: "GET",
                                        success: function (data) {
                                            console.log(data); // Log the response data to the console
                                            // Display appointment details
                                            var serviceNames = data.title;
                                            var appointmentDetails = "Service Name: " + serviceNames + "\n" +
                                                "Start Time: " + moment(data.start).format("YYYY-MM-DD HH:mm:ss") + "\n" +
                                                "End Time: " + moment(data.end).format("YYYY-MM-DD HH:mm:ss") + "\n" +
                                                "Concern: " + data.concern;
                                            alert(appointmentDetails);
                                        },
                                        error: function (error) {
                                            console.log(error.responseText); // Log the error response to the console
                                            alert("Error fetching appointment details");
                                        }
                                    });
                                },

                            });

                });

                /*------------------------------------------
                --------------------------------------------
                Toastr Success Code
                --------------------------------------------
                --------------------------------------------*/
                function displayMessage(message) {
                    toastr.success(message, 'Event');
                }

            </script>

        @yield('content')
    @endauth
</body>


</html>
