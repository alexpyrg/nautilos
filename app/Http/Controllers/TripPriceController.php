<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\TripPrice;
use App\Models\TripType;
use Illuminate\Http\Request;

class TripPriceController extends Controller
{
    // Display a form to add trip prices
    public function create()
    {
        $tripTypes = TripType::all(); // Fetch all trip types
        $seasons = Season::all(); // Fetch all seasons
        return view('trips.prices-index', compact('tripTypes', 'seasons'));
    }

    // Store a new trip price
    public function store(Request $request)
    {
        $request->validate([
            'trip_type_id' => 'required|exists:trip_types,id',
            'season_id' => 'required|exists:seasons,id',
            'price_per_adult' => 'required|numeric|min:0',
            'price_per_child' => 'required|numeric|min:0',
        ]);

        TripPrice::create($request->only([
            'trip_type_id',
            'season_id',
            'price_per_adult',
            'price_per_child',
        ]));

        return redirect()->route('trip-prices.create')->with('success', 'Trip price added successfully!');
    }

    // Display all trip prices
    public function index()
    {
        $tripPrices = TripPrice::with(['tripType', 'season'])->get();
        $tripTypes = TripType::all();
        $seasons = Season::all();
        return view('trips.prices-index', compact('tripPrices', 'tripTypes', 'seasons'));
    }
}
