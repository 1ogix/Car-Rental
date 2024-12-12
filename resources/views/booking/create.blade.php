@extends('layouts.app')

@section('title', 'Add Booking')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Add New Booking</h2>

        <!-- Add an ID to the form for handling it with jQuery -->
        <form id="booking-form" action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="car_id" class="block font-medium">Select Car</label>
                <select name="car_id" id="car_id" class="w-full border rounded p-2">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->name }} - {{ $car->plate_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="customer_name" class="block font-medium">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block font-medium">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block font-medium">End Date</label>
                <input type="date" name="end_date" id="end_date" class="w-full border rounded p-2" required>
            </div>
            {{-- newly added, uploading a proof of payment option --}}
            <div class="mb-4">
                <label for="proof_of_downpayment" class="block font-medium">Proof of Downpayment</label>
                <input type="file" name="proof_of_downpayment" id="proof_of_downpayment"
                    class="w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Save Booking
            </button>
        </form>
    </div>
@endsection

@section('scripts')
@vite(['resources/js/booking.js'])
@endsection
