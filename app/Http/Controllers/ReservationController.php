<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function index()
    {
        return view(view: 'reservations'); // Ensure 'resources/views/home.blade.php' exists
    }
}
