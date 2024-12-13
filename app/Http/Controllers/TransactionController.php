<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Booking;

class TransactionController extends Controller
{
    //
    public function index()
    {
        // Fetch approved bookings or transactions
        // $transactions = Booking::where('status', 'approved')->get();
        // $transactions = Booking::with('car')->where('status', 'approved')->get();
        // $transactions = Transaction::all();
        $transactions = Transaction::with('booking.car')->get();

        // Pass the transactions to the view
        return view('transactions', compact('transactions'));
    }
}
