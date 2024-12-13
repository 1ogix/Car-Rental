@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Cars</h1>
        <a href="{{ route('cars.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Car</a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($cars as $car)
            <x-car-card :car="$car" />
        @endforeach
    </div>
</div>
@endsection
