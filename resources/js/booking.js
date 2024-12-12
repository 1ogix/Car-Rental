// Handle the form submission dynamically with AJAX
$("#booking-form").submit(function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Perform an AJAX POST request
    $.ajax({
        url: $(this).attr("action"), // Form action URL
        method: "POST",
        data: $(this).serialize(), // Serialize form data
        success: function (response) {
            alert(response.message); // Notify the user about the success
            fetchReservations(); // Refresh the reservations list dynamically
        },
        error: function (error) {
            console.error("Error creating booking:", error);
        },
    });
});
