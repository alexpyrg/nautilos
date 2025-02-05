<?php

namespace App\Http\Controllers;

use App\Models\TripType;
use Illuminate\Http\Request;

class TripTypeController extends Controller
{
    // Display a list of trip types
    public function index()
    {
        $tripTypes = TripType::all();
        return view('trips.index', compact('tripTypes'));
    }

    // Show the form to create a new trip type
    public function create()
    {
        return view('trips.create');
    }

    // Store a new trip type
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:trip_types,name',
        ]);

        TripType::create($request->only('name'));

        return redirect()->route('trips.index')->with('success', 'Trip type created successfully!');
    }

    // Show the form to edit a trip type
    public function edit(   Request $tripType)
    {
        dd($tripType->all());
        return view('trips.edit', compact('tripType'));
    }

    // Update a trip type
    public function update(Request $request, TripType $tripType)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:trip_types,name,' . $tripType->id,
        ]);

        $tripType->update($request->only('name'));
        $tripType->save();

        return redirect()->route('trips.index')->with('success', 'Trip type updated successfully!');
    }

    // Delete a trip type
    public function destroy(TripType $tripType)
    {
        $tripType->delete();
        return redirect()->route('trips.index')->with('success', 'Trip type deleted successfully!');
    }
}
