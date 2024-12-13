@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add a New Car</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block font-bold mb-1">Name</label>
            <input type="text" name="name" class="w-full border p-2" value="{{ old('name') }}" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Model</label>
            <input type="text" name="model" class="w-full border p-2" value="{{ old('model') }}" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Plate Number</label>
            <input type="text" name="plate_number" class="w-full border p-2" value="{{ old('plate_number') }}" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Image</label>
            <input type="file" name="image" class="w-full border p-2">
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
        <a href="{{ route('cars.index') }}" class="ml-2 text-blue-500 underline">Cancel</a>
    </form>
</div>
@endsection
