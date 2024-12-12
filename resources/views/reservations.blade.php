@extends('layouts.app')

@section('title', 'Reservations')

@section('content')
    <div class="flex">
        <!-- Reservations List -->
        <div class="flex flex-col w-1/2 bg-white h-screen p-4">
            <h2 class="font-bold mb-4">Reservations</h2>
            <div class="flex flex-col grow justify-between bg-gray-300">
                <div id="reservations-container">
                    <!-- Reservations will be dynamically loaded here -->
                </div>
                <!-- Debugging: Add a button to manually refresh reservations -->
                <button id="refresh-reservations" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Refresh Reservations
                </button>

            </div>

        </div>

        <!-- Details Section -->
        <div class="w-1/4 bg-gray-100 h-screen p-4 grow">
            <h2 class="font-bold mb-4">Details</h2>
            <div id="reservation-details">
                <!-- Reservation details will appear here -->
                <p class="text-gray-500">Click on a reservation to see its details.</p>
            </div>
        </div>
    </div>
@endsection

<!-- Include jQuery -->
@section('scripts')
    {{-- <script src="{{ asset('resources/js/reservations.js') }}"></script> --}}
    @vite(['resources/js/reservations.js'])
@endsection
