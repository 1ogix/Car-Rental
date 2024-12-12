<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

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
            'proof_of_downpayment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof_of_downpayment')) {
            $imagePath = $request->file('proof_of_downpayment')->store('downpayments', 'public');
        } else {
            $imagePath = null;
        }
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
                'car' => [
                    'name' => $reservation->car->name,
                    'model' => $reservation->car->model,
                    'plate_number' => $reservation->car->plate_number,
                ],
                'start_date' => $reservation->start_date,
                'end_date' => $reservation->end_date,
                'status' => $reservation->status, // <--- Add this line
            ];
        }));
    }

    public function getReservationDetails($id)
    {
        $reservation = Booking::with('car')->findOrFail($id);

        return response()->json([
            'customer_name' => $reservation->customer_name,
            'car' => [
                'name' => $reservation->car->name,
                'model' => $reservation->car->model,
                'plate_number' => $reservation->car->plate_number, // Added car plate number
            ],
            'start_date' => $reservation->start_date,
            'end_date' => $reservation->end_date,
        ]);
    }
    //Handle approve reservation
    public function approve($id)
    {
        $booking = Booking::with('car')->findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        // Create a transaction entry
        Transaction::create([
            'booking_id' => $booking->id,
            'customer_name' => $booking->customer_name,
            'car_name' => $booking->car->name,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
            'payment_status' => $booking->payment_status,
        ]);
        // $booking->delete(); // This will delete the booking from the database

        return response()->json(['success' => true, 'message' => 'Reservation approved successfully']);
    }

    public function decline($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'declined';
        $booking->save();

        // Delete the booking after declining
        $booking->delete(); // This will delete the booking from the database

        return response()->json(['success' => true, 'message' => 'Reservation declined successfully']);
    }

}
