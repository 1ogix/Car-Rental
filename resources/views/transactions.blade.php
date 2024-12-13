@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div>
        <!-- It is never too late to be what you might have been. - George Eliot -->
        <h1>transactions page</h1>
        <h2 class="font-bold text-2xl mb-4">Transactions</h2>
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Customer Name</th>
                <th class="px-4 py-2">Car Name</th>
                <th class="px-4 py-2">Car Model</th>
                <th class="px-4 py-2">Car Plate Number</th>
                <th class="px-4 py-2">Start Date</th>
                <th class="px-4 py-2">End Date</th>
                <th class="px-4 py-2">Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="border px-4 py-2">{{ $transaction->customer_name }}</td>
                    {{-- <td class="border px-4 py-2">{{ $transaction->car->name}}</td> --}}
                    {{-- <td class="border px-4 py-2">{{ $transaction->car->model}}</td> --}}
                    {{-- <td class="border px-4 py-2">{{ $transaction->car->plate_number}}</td> --}}
                    <td>{{ $transaction->booking->car->name }}</td>
                    <td>{{ $transaction->booking->car->model }}</td>
                    <td>{{ $transaction->booking->car->plate_number }}</td>
                    <td class="border px-4 py-2">{{ $transaction->start_date }}</td>
                    <td class="border px-4 py-2">{{ $transaction->end_date }}</td>
                    <td class="border px-4 py-2">{{ $transaction->payment_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
