console.log("Reservations page loaded"); // Log when the page is loaded
// Fetch reservations on page load
function fetchReservations() {
    console.log("Fetching reservations..."); // Ensure this is logged
    $.ajax({
        url: "/api/reservations",
        method: "GET",
        success: function (data) {
            console.log("Fetched reservations:", data); // Log the entire response
            const container = $("#reservations-container");
            container.empty(); // Clear existing content

            const pendingReservations = data.filter(
                (reservation) => reservation.status !== "approved"
            );

            if (pendingReservations.length === 0) {
                container.append("<p>No reservations found.</p>");
            } else {
                pendingReservations.forEach(function (reservation) {
                    console.log("Reservation details:", reservation); // Log each reservation
                    container.append(`
            <div class="p-4 bg-blue-100 mb-2 rounded cursor-pointer reservation-item" data-id="${reservation.id}">
                <p class="font-bold">${reservation.customer_name}</p>
                <button class="approve-btn bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded mt-2" data-id="${reservation.id}">Approve</button>
                <button class="decline-btn bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded mt-2" data-id="${reservation.id}">Decline</button>
            </div>
        `);
                });
            }
            console.log("Updated container HTML:", container.html());
        },
        error: function (error) {
            console.error("Error fetching reservations:", error);
        },
    });
}

$("#refresh-reservations").on("click", function () {
    console.log("Manual refresh triggered");
    fetchReservations(); // Fetch reservations when the button is clicked
});
// Handle Approve button click - This part is the change
$(document).on("click", ".approve-btn", function () {
    const reservationId = $(this).data("id");
    console.log("Approving reservation ID:", reservationId);

    $.ajax({
        url: `/api/reservations/approve/${reservationId}`,
        method: "POST",
        success: function (response) {
            console.log("Reservation approved:", response);
            alert(response.message);
            alert(reservationId);
            fetchReservations(); // Refresh the reservations list
            // Remove the approved reservation from the DOM - This part is the change
            $(`.reservation-item[data-id="${reservationId}"]`).remove(); // This line removes the approved reservation
        },
        error: function (error) {
            console.error("Error approving reservation:", error);
        },
    });
}); // End of change here

// Handle Decline button click - This part is the change
$(document).on("click", ".decline-btn", function () {
    const reservationId = $(this).data("id");
    console.log("Declining reservation ID:", reservationId);

    $.ajax({
        url: `/api/reservations/decline/${reservationId}`,
        method: "POST",
        success: function (response) {
            console.log("Reservation declined:", response);
            alert(response.message);
            fetchReservations(); // Refresh the reservations list
            // Remove the declined reservation from the DOM - This part is the change
            $(`.reservation-item[data-id="${reservationId}"]`); // This line removes the declined reservation
        },
        error: function (error) {
            console.error("Error declining reservation:", error);
        },
    });
}); // End of change here

// Handle reservation click
$(document).on("click", ".reservation-item", function () {
    const reservationId = $(this).data("id");
    console.log("Clicked reservation ID:", reservationId); // Log the clicked reservation ID

    // Fetch reservation details
    $.ajax({
        url: `/api/reservations/${reservationId}`,
        method: "GET",
        success: function (data) {
            console.log("Fetched reservation details:", data); // Log the details
            const details = $("#reservation-details");
            details.html(`
                    <p><strong>Customer Name:</strong> ${data.customer_name}</p>
                    <p><strong>Car:</strong> ${data.car.name}</p>
                    <p><strong>Car plate#:</strong> ${data.car.plate_number}</p>
                    <p><strong>Start Date:</strong> ${data.start_date}</p>
                     <p><strong>End Date:</strong> ${data.end_date}</p>
                `);
        },
        error: function (error) {
            console.error("Error fetching reservation details:", error);
        },
    });
});

// Trigger fetchReservations after form submission
$("#booking-form").on("submit", function (e) {
    e.preventDefault(); // Prevent page reload
    const formData = $(this).serialize();

    $.ajax({
        url: $(this).attr("action"),
        method: "POST",
        data: formData,
        success: function (response) {
            console.log("Booking added successfully:", response); // Log success
            fetchReservations(); // Fetch updated reservations
        },
        error: function (error) {
            console.error("Error adding booking:", error); // Log errors
        },
    });
});
$("#refresh-reservations").on("click", function () {
    console.log("Refresh button clicked"); // Check if this is logged
    fetchReservations();
});

// Fetch reservations initially
fetchReservations();
