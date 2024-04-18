<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Your Default Title')</title>

    <!-- Your existing head content goes here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- End of your existing head content -->

    <!-- Additional styles or scripts can be added in respective sections or directly here -->
</head>
<body>
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

    <!-- Additional scripts can be added here -->

</body>
</html>
