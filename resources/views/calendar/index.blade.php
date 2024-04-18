<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hugo-Foronda Dental Clinic</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/calendar.css" />

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    {{-- <script defer src='https://static.cloudflareinsights.com/beacon.min.js'
        data-cf-beacon='{"token": "dc4641f860664c6e824b093274f50291"}'></script> --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
</head>


<body>


    {{-- {{ dd($minHour) }} --}}
    <div class="w-full border-2">
        {{-- <div class="row"> --}}
        {{-- <div class="col-12"> --}}
        <h3 class="my-3 text-center">Appointment Calendar</h3>

        <div class="mx-3" id="calendar">

        </div>

        {{-- </div> --}}
        {{-- </div> --}}
    </div>

    {{-- Modal Start --}}

    {{-- Create Modal --}}
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModal" aria-hidden="true"
        style="z-index: 1050;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Schedule an Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="selected-date"></p>
                    <p id="selected-time"></p>

                    <label>Select Time</label>
                    <div class="grid w-full grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-2">

                        @for ($i = $minHour; $i <= $maxHour; $i++)
                            @php
                                $a = $i;
                                $meridian = 'AM';
                            @endphp
                            @if ($i == 12)
                                @php
                                    // $a -= 1;
                                    $meridian = 'PM';
                                @endphp
                            @elseif ($i > 12)
                                @php
                                    $a -= 12;
                                    $meridian = 'PM';
                                @endphp
                            @endif

                            <div class="flex flex-row gap-3">
                                <button type="button" class="btn btn-outline-primary time"
                                    value="{{ $i . ':00 ' }}">{{ $a . ':00 ' . $meridian . '-' . $a . ':30 ' . $meridian }}</button>
                                <button type="button" class="btn btn-outline-primary time"
                                    value="{{ $i . ':30 ' }}">{{ $a . ':30 ' . $meridian . '-' . ($a + 1) . ':00 ' . $meridian }}</button>
                            </div>
                        @endfor
                    </div>

                    <x-textarea label="Concern" id="concern" placeholder="write your annotations"
                        wire:model.lazy='concern' />
                    <span id="concernError" class="text-danger"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <x-button blue label="Save" wire:click='createAppointment' /> --}}
                    <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


    {{-- View Modal --}}
    <div class="modal fade" id="viewAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="z-index: 1050;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 id='event-title'></h3>
                    <p id='date'></p>
                    <p id='time'></p>
                    <span id="titleError" class="text-danger"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id='cancel-appointment'>Cancel
                        Appointment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" id="saveBtn" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- schedule restriction modal --}}
    <x-modal>
        <x-card title="Consent Terms">
            <p class="text-gray-600">
                You cannot book on this day.
            </p>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Okay" x-on:click="close" />
                    <x-button primary label="I Agree" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>


    {{-- Modal End --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('vendor\livewire\livewire\dist\livewire.js') }}"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = @json($events);
            var constraints = @json($constraints);
            var startDate;
            var endDate;
            var dateTime;
            var endDateTime;
            var startTime;
            var eventId;


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Cancel Appointment
            $("button#cancel-appointment").click(function() {
                console.log(eventId);
                // var cancel = $(this).val();

                $.ajax({
                    url: "{{ route('calendar.cancel') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        eventId,
                    },
                    success: function(response) {
                        $('#viewAppointmentModal').modal('hide');

                        window.$wireui.dialog({
                            title: 'Canceled',
                            description: 'Your appointment is now canceled.',
                            icon: 'success'
                        });

                        location.reload();

                    },
                    error: function(error) {
                        if (error.responseJSON.errors) {
                            $('#concernError').html('the concern field is required.');
                        }
                    },
                    // Further processing or AJAX call can be added here
                });
            });


            $("button.time").click(function() {
                var startTime = $(this).val();
                var fullDateTime = startDate + ' ' + startTime;
                // Create a new Date object for the selected date-time
                var selectedDate = new Date(fullDateTime);

                // Calculate end date by adding 30 minutes to the selected date
                var endDate = new Date(selectedDate.getTime() + 30 * 60000);
                // console.log(selectedDate);
                // console.log(endDate);

                dateTime = selectedDate;
                endDateTime = endDate;



            });

            function formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                const seconds = String(date.getSeconds()).padStart(2, '0');

                return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
            }




            // Save Appointment
            $('#saveBtn').click(function() {

                // $.ajax({
                //     url: 'index.php',
                //     method: 'GET',
                //     success: function(response) {
                //         selectedTime = response;
                //         console.log(selectedTime);
                //     },
                //     error: function(xhr, status, error) {
                //         // console.error('Error fetching PHP variable:', error);
                //     }
                // });

                Livewire.on('selectedTimeUpdated', (selectedTime) => {
                    console.log('Selected time updated:', selectedTime);
                    // Perform any actions with the updated value
                });

                var title = $('#concern').val(); // Use the correct selector for the 'concern' element
                // console.log(startDate);
                var start_date = formatDate(dateTime);
                var end_date = formatDate(endDateTime);

                $.ajax({
                    url: "{{ route('calendar.store') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        title,
                        start_date,
                        end_date
                    },
                    success: function(response) {
                        $('#appointmentModal').modal('hide');

                        window.$wireui.dialog({
                            title: 'Success!',
                            description: 'Your appointment is now scheduled.',
                            icon: 'success'
                        });

                        location.reload();

                    },
                    error: function(error) {
                        if (error.responseJSON.errors) {
                            $('#concernError').html('the concern field is required.');
                        }
                    },
                    // Further processing or AJAX call can be added here
                });
            });


            // Full Calendar
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'local', // will be parsed as local
                nowIndicator: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                dayMaxEventRows: true, // allow "more" link when too many events
                editable: false,
                navLinks: true,
                progressiveEventRendering: true,
                // navLinkDayClick: function(date, jsEvent) {
                //     console.log('day', date.toISOString());
                //     console.log('coords', jsEvent.pageX, jsEvent.pageY);
                // },
                // to set the date and time limitation
                events: events,
                views: {
                    timeGrid: {
                        dayMaxEventRows: 2 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                },

                businessHours: [ // specify an array instead
                    {
                        daysOfWeek: [1, 2, 3], // Monday, Tuesday, Wednesday
                        startTime: '08:00', // 8am
                        endTime: '17:00' // 6pm
                    },
                    {
                        daysOfWeek: [4, 5, 6], // Thursday, Friday, Saturday
                        startTime: '8:00', // 10am
                        endTime: '17:00' // 4pm
                    },
                ],
                // selectConstraint: constraints,
                headerToolbar: {
                    start: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    end: 'prevYear,prev,next,nextYear'
                },
                // dayCellContent: function(info) {
                //     var myDate = new Date();
                //     var startDate = info.date;

                //     // Set hours, minutes, seconds, and milliseconds to 0 for accurate comparison
                //     myDate.setHours(0, 0, 0, 0);
                //     startDate.setHours(0, 0, 0, 0);

                //     // Compare the dates
                //     if (startDate < myDate) {
                //         // Apply custom styling for past dates
                //         // console.log(startDate);
                //         // startDate.style.backgroundColor = 'green';
                //         background - color = red;

                //         // info.el.style.backgroundColor = 'red';


                //     }
                // },
                // dayRender: function(date, cell) {

                //     if (!dateHasEvent(date))
                //         cell.css("background-color", "red");
                //     else if (dateHasEvent(date))
                //         cell.css("background-color", "yellow");
                // },
                dateClick: function(info) {
                    var myDate = new Date();
                    startDate = new Date(info.dateStr);
                    // alert(myDate);
                    // console.log('clicked ' + info.dateStr);

                    if (new Date(info.dateStr) < myDate) {

                        // DO NOTHING
                        // if clicked date is less than today


                        //TRUE Clicked date smaller than today + daysToadd
                        // alert(info.dateStr);
                        // window.$wireui.dialog({
                        //     // title: '!',
                        //     description: 'You cannot book on this day.',
                        //     icon: 'error'
                        // })

                    } else if (startDate.getDay() == 0) {

                        // DO NOTHING
                        // if day selected is 0 or sunday


                        // window.$wireui.dialog({
                        //     // title: '!',
                        //     description: 'You cannot book on this day.',
                        //     icon: 'error'
                        // })

                    } else {
                        $('#appointmentModal').modal('toggle');

                        $('#appointmentModal').on('shown.bs.modal', function(e) {
                            // Update the content of the modal body

                            $('#appointmentModal .modal-body #selected-time').html('');
                            startDate = new Date(info.dateStr);
                            console.log(startDate);
                            var formattedStartDate = startDate.toISOString().split(
                                'T')[
                                0]; // 'YYYY-MM-DD' format


                            startDate = formattedStartDate;
                            endDate = formattedStartDate;


                            $('#appointmentModal .modal-body #selected-date').html('Date: ' +
                                new Date(info
                                    .dateStr).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    weekday: 'long'
                                }));

                            $("button.time").click(function() {
                                $('#appointmentModal .modal-body #selected-time').html(
                                    'Time: ' +
                                    new Date(dateTime).toLocaleTimeString(
                                        'en-US', {
                                            hour: 'numeric',
                                            minute: 'numeric',
                                            hour12: true // Use 12-hour clock
                                        }));


                            });



                            // Clear the title input field
                            $('#concern').val('');

                            // Clear any previous error message
                            $('#titleError').text('');
                        });
                    }



                },
                // When event is clicked
                eventClick: function(info) {
                    var eventObj = info.event;
                    // console.log(eventObj.id);
                    eventId = eventObj.id;

                    // alert('Clicked ' + eventObj.title);

                    $('#viewAppointmentModal').modal('toggle');
                    $('#viewAppointmentModal').on('shown.bs.modal', function(e) {
                        // Update the content of the modal body
                        $('#viewAppointmentModal .modal-body h3').html('Title: ' +
                            eventObj
                            .title);

                        $('#viewAppointmentModal .modal-body #date').html('Date: ' +
                            new Date(eventObj.start).toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                weekday: 'long'
                            }));
                        $('#viewAppointmentModal .modal-body #time').html('Time: ' +
                            new Date(eventObj.start).toLocaleTimeString('en-US', {
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true // Use 12-hour clock
                            }));


                        // Clear the title input field
                        $('#title').val('');

                        // Clear any previous error message
                        $('#titleError').text('');
                    });
                },

            });
            calendar.render();

            // alert($('.fc-past'));

            // if (new Date(info.dateStr) < dateToday){
                $('.fc-event').css('background-color', 'red');
                // $('.fc').css('color', 'blue');
            // }
        });
    </script>
</body>

</html>
