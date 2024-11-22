<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Return the 'users' view with the users data
        return view('users', compact('users'));
    }
}
