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
        $tripTypes = TripType::all();
        $seasons = Season::all();
        $tripPrices = TripPrice::with(['tripType', 'season'])->get();

        // Filter out trip types that already have prices for all seasons
        $tripTypes = $tripTypes->reject(function ($tripType) use ($tripPrices, $seasons) {
            $pricedSeasons = $tripPrices->where('trip_type_id', $tripType->id)->pluck('season_id')->toArray();
            return count($pricedSeasons) == $seasons->count(); // Exclude trip types that have all seasons priced
        });

        // Build a mapping of trip_type_id to seasons that are already priced
        $pricedSeasonsByTripType = [];
        foreach ($tripPrices as $tripPrice) {
            $pricedSeasonsByTripType[$tripPrice->trip_type_id][] = $tripPrice->season_id;
        }

        return view('trips.prices-index', compact('tripTypes', 'seasons', 'tripPrices', 'pricedSeasonsByTripType'));
    }

    public function destroy(TripPrice $tripPrice)
    {
        $tripPrice->delete();
        return redirect()->route('trip-prices.create')->with('success', 'Trip price deleted successfully.');
    }
    // Store a new trip price
    public function store(Request $request)
    {
        $request->validate([
            'trip_type_id' => 'required|exists:trip_types,id',
            'season_id' => 'required|exists:seasons,id',
            'one_price' => 'nullable|numeric|min:0',
            'price_per_adult' => 'nullable|numeric|min:0|required_without:one_price',
            'price_per_child' => 'nullable|numeric|min:0|required_without:one_price',
        ]);

        TripPrice::create($request->only([
            'trip_type_id',
            'season_id',
            'one_price',
            'price_per_adult',
            'price_per_child',
        ]));

        return redirect()->route('trip-prices.index')->with('success', 'Trip price added successfully!');
    }



    public function index()
    {
        $tripPrices = TripPrice::with(['tripType', 'season'])->get();
        $tripTypes = TripType::all();
        $seasons = Season::all();

        // Remove trip types that already have prices for all seasons
        $tripTypes = $tripTypes->reject(function ($tripType) use ($tripPrices, $seasons) {
            $pricedSeasons = $tripPrices->where('trip_type_id', $tripType->id)->pluck('season_id')->toArray();
            return count($pricedSeasons) == $seasons->count(); // Exclude trip types that have all seasons priced
        });

        // Build a mapping of trip_type_id to seasons that are already priced
        $pricedSeasonsByTripType = [];
        foreach ($tripPrices as $tripPrice) {
            $pricedSeasonsByTripType[$tripPrice->trip_type_id][] = $tripPrice->season_id;
        }

        return view('trips.prices-index', compact('tripPrices', 'tripTypes', 'seasons', 'pricedSeasonsByTripType'));
    }
}
