@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div style="text-align: right; margin-bottom: 20px;">
        <!-- Display the logged-in user's name -->
        <span>Welcome, {{ Auth::user()->name }}</span>
    </div>

    <div class="flex justify-center mb-4 ">
        <a id="reserveButton" href="{{ route('booking.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Reserve
        </a>
    </div>
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
@endsection
