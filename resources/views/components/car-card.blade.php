<div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white">
    @if($car->image)
        <img class="w-full h-48 object-cover" src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}">
    @else
        <img class="w-full h-48 object-cover" src="{{ asset('default-car.png') }}" alt="{{ $car->name }}">
    @endif
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $car->name }}</div>
        <p class="text-gray-700 text-base"><strong>Model:</strong> {{ $car->model }}</p>
        <p class="text-gray-700 text-base"><strong>Plate Number:</strong> {{ $car->plate_number }}</p>
    </div>
    <div class="px-6 pt-4 pb-2 flex justify-between">
        <a href="{{ route('cars.edit', $car) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <form action="{{ route('cars.destroy', $car) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </div>
</div>
