<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //Calendar Controller
    public function index()
    {
        return view('calendar'); // Ensure 'resources/views/home.blade.php' exists
    }
}
