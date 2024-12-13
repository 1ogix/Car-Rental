<?php


namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'plate_number' => 'required|unique:cars,plate_number',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
        }

        Car::create([
            'name' => $request->name,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'image' => $imagePath,
        ]);

        return redirect()->route('cars.index')->with('success', 'Car added successfully');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'plate_number' => 'required|unique:cars,plate_number,' . $car->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('car_images', 'public');
        }

        $car->update($data);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
