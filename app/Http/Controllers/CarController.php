<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index()
    {
        return view(view: 'cars'); // Ensure 'resources/views/home.blade.php' exists
    }
}
