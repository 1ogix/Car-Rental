<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;


class BookingController extends Controller
{
    //
    public function create()
    {
        $cars = Car::all();
        return view('booking.create', compact('cars'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $booking = Booking::create($request->all());

        // return redirect('home')->with('success', 'Booking created successfully');
        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully',
            'booking' => $booking
        ]);

    }
    public function getBookings()
    {
        $bookings = Booking::with('car')->get();



        return response()->json($bookings->map(function ($booking) {
            return [
                'title' => $booking->customer_name . ' (' . $booking->car->name . ')',
                'start' => $booking->start_date,
                // 'end' => $booking->end_date,
                'end' => date('Y-m-d', strtotime($booking->end_date . ' +1 day')), // Add 1 day to end date
            ];
        }));

    }
    public function getReservations()
    {
        $reservations = Booking::with('car')->get();

        return response()->json($reservations->map(function ($reservation) {
            return [
                'id' => $reservation->id,
                'customer_name' => $reservation->customer_name,
                'car' => $reservation->car->name,
                'start_date' => $reservation->start_date,
                'end_date' => $reservation->end_date,
            ];
        }));
    }

    public function getReservationDetails($id)
    {
        $reservation = Booking::with('car')->findOrFail($id);

        return response()->json([
            'customer_name' => $reservation->customer_name,
            'car' => $reservation->car->name,
            'start_date' => $reservation->start_date,
            'end_date' => $reservation->end_date,
        ]);
    }

}
