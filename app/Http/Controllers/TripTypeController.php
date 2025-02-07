<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\TripType;
use App\Models\TripTypeTranslation;
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
    public function edit(Request $req)
    {
//        dd($req->id);
        $trip = TripType::where('id', $req->id)->first();
        $locales = Locale::all(); // Get all available languages

        $tripTranslations = TripTypeTranslation::where('trip_type_id', $trip->id)->get();
        $translationsByLocale = $tripTranslations->pluck('name', 'locale_id')->toArray();



        return view('trips.edit', compact('trip', 'locales', 'tripTranslations', 'translationsByLocale'));
    }

    // Update a trip type
    public function update(Request $request)
    {

//        dd($request);
        $tripType = TripType::where('id', $request->id)->first();

        $request->validate([
//            'name' => 'required|string|max:255|unique:trip_types,name,',
            'translations' => 'array',
            'name' => 'required',
            'translations.*' => 'nullable|string|max:255',
        ]);

        $tripType->update($request->only('name'));


        foreach ($request->translations as $localeId => $translationText) {
            if ($translationText) {
                TripTypeTranslation::updateOrCreate(
                    ['trip_type_id' => $tripType->id, 'locale_id' => $localeId],
                    ['name' => $translationText]
                );
            }
        }

        return redirect()->route('trips.index')->with('success', 'Trip type updated successfully!');
    }

    // Delete a trip type
    public function destroy(TripType $tripType)
    {
        $tripType->delete();
        return redirect()->route('trips.index')->with('success', 'Trip type deleted successfully!');
    }
}
