@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
    <div class="flex">
        <!-- Reservations List -->
        <div class="w-1/2 bg-white h-screen p-4">
            <h2 class="font-bold mb-4">Reservations</h2>
            <div id="reservations-container">
                <!-- Reservations will be dynamically loaded here -->
            </div>
            <!-- Debugging: Add a button to manually refresh reservations -->
            <button id="refresh-reservations" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Refresh Reservations
            </button>
        </div>

        <!-- Details Section -->
        <div class="w-1/4 bg-gray-100 h-screen p-4">
            <h2 class="font-bold mb-4">Details</h2>
            <div id="reservation-details">
                <!-- Reservation details will appear here -->
                <p class="text-gray-500">Click on a reservation to see its details.</p>
            </div>
        </div>
    </div>
@endsection

<!-- Include jQuery -->
@section('scripts')
    <script>
        console.log('Reservations page loaded'); // Log when the page is loaded
        // Fetch reservations on page load
        function fetchReservations() {
            console.log('Fetching reservations...'); // Ensure this is logged
            $.ajax({
                url: '/api/reservations',
                method: 'GET',
                success: function(data) {
                    console.log('Fetched reservations:', data); // Log the entire response
                    const container = $('#reservations-container');
                    container.empty(); // Clear existing content

                    if (data.length === 0) {
                        container.append('<p>No reservations found.</p>');
                    } else {
                        data.forEach(function(reservation) {
                            console.log('Reservation details:', reservation); // Log each reservation
                            container.append(`
            <div class="p-4 bg-blue-100 mb-2 rounded cursor-pointer reservation-item" data-id="${reservation.id}">
                <p class="font-bold">${reservation.customer_name}</p>
            </div>
        `);
                        });
                    }
                },
                error: function(error) {
                    console.error('Error fetching reservations:', error);
                }
            });
        }

        $('#refresh-reservations').on('click', function() {
            console.log('Manual refresh triggered');
            fetchReservations(); // Fetch reservations when the button is clicked
        });

        // Handle reservation click
        $(document).on('click', '.reservation-item', function() {
            const reservationId = $(this).data('id');
            console.log('Clicked reservation ID:', reservationId); // Log the clicked reservation ID

            // Fetch reservation details
            $.ajax({
                url: `/api/reservations/${reservationId}`,
                method: 'GET',
                success: function(data) {
                    console.log('Fetched reservation details:', data); // Log the details
                    const details = $('#reservation-details');
                    details.html(`
                    <p><strong>Customer Name:</strong> ${data.customer_name}</p>
                    <p><strong>Car:</strong> ${data.car.name}</p>
                    <p><strong>Start Date:</strong> ${data.start_date}</p>
                    <p><strong>End Date:</strong> ${data.end_date}</p>
                `);
                },
                error: function(error) {
                    console.error('Error fetching reservation details:', error);
                }
            });
        });

        // Trigger fetchReservations after form submission
        $('#booking-form').on('submit', function(e) {
            e.preventDefault(); // Prevent page reload
            const formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Booking added successfully:', response); // Log success
                    fetchReservations(); // Fetch updated reservations
                },
                error: function(error) {
                    console.error('Error adding booking:', error); // Log errors
                }
            });
        });
        $('#refresh-reservations').on('click', function() {
            console.log('Refresh button clicked'); // Check if this is logged
            fetchReservations();
        });

        // Fetch reservations initially
        fetchReservations();
    </script>
@endsection
