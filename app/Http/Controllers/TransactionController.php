<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        return view(view: 'transactions'); // Ensure 'resources/views/home.blade.php' exists
    }
}
