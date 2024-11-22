@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div style="text-align: right; margin-bottom: 20px;">
        <!-- Display the logged-in user's name -->
        <span>Welcome, {{ Auth::user()->name }}</span>
    </div>
    <div>
        <!-- It is never too late to be what you might have been. - George Eliot -->
        <h1>test</h1>
    </div>
@endsection
