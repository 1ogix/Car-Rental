@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div style="text-align: right; margin-bottom: 20px;">
        <!-- Display the logged-in user's name -->
        <span>Welcome, {{ Auth::user()->name }}</span>
    </div>

    <div>
        <h1>Calendar Page</h1>
    </div>

    <!-- FullCalendar container -->
    <div class="max-w-screen-lg mx-auto bg-white shadow-md rounded-lg p-5">
        <!-- FullCalendar container -->
        <div id="calendar" class="w-full h-[700px] rounded-lg shadow-md border border-gray-300"></div>
    </div>

    <!-- FullCalendar initialization script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Can be 'timeGridWeek', 'timeGridDay', etc.
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    // Make an AJAX request to your API endpoint
                    fetch('/api/bookings', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            successCallback(data); // Pass the events data to FullCalendar
                        })
                        .catch(error => {
                            console.error('Error fetching events:', error);
                            failureCallback(error); // Notify FullCalendar of the failure
                        });
                },
                // events: [{ // this object will be "parsed" into an Event Object
                //     title: 'The Title', // a property!
                //     start: '2024-12-09', // a property!
                //     end: '2024-12-10' // a property! ** see important note below about 'end' **
                // }]
            });

            calendar.render();
        });
    </script>
@endsection
