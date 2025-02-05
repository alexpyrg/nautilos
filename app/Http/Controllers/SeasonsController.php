<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    // Determine the season for a given trip date (month and day)
    public function getSeasonForTripDate(Request $request)
    {
        $request->validate([
            'trip_date' => 'required|date_format:m/d',
        ]);

        // Parse the trip date with a placeholder year
        $tripDate = Carbon::createFromFormat('m/d', $request->trip_date)->year(2000);

        // Find the season that includes the trip date
        $season = Season::where('start_date', '<=', $tripDate)
            ->where('end_date', '>=', $tripDate)
            ->first();

        if ($season) {
            return response()->json([
                'season' => $season->name,
                'trip_date' => $tripDate->format('m/d'),
            ]);
        } else {
            return response()->json([
                'error' => 'No season found for the selected date.',
            ], 404);
        }
    }

    // Display a list of seasons
    public function index()
    {
        $seasons = Season::all(); // Fetch all seasons from the database
        return view('seasons.index', compact('seasons')); // Pass seasons to the view
    }

    // Store a new season
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:m/d',
            'end_date' => 'required|date_format:m/d|after:start_date',
        ]);

        // Add a placeholder year (e.g., 2000) to the dates
        $startDate = Carbon::createFromFormat('m/d', $request->start_date)->year(2000);
        $endDate = Carbon::createFromFormat('m/d', $request->end_date)->year(2000);

        Season::create([
            'name' => $request->name,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        return response()->json(['success' => 'Season created successfully.']);
    }

    // Show the form for creating a new season
    public function create(Request $request)
    {
        $name = $request->name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        try{
            $season = Season::create([
                'name' => $name,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ])->save();

        }catch (\Exception $exception){
            return redirect()->route('seasons.index')->with('error', $exception->getMessage());
        }
//        return view('seasons.create');
        return redirect()->route('seasons.index')->with('success', 'Η Σεζόν αποθυκεύτηκε επιτυχώς!');
    }//


    // Display the specified season
    public function show(Season $season)
    {
        return view('seasons.show', compact('season'));
    }

    // Show the form for editing the specified season
    public function edit(Season $season)
    {
        return view('seasons.edit', compact('season'));
    }

    // Update the specified season in the database
    public function update(Request $request, Season $season)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:m/d',
            'end_date' => 'required|date_format:m/d|after:start_date',
        ]);

        // Add a placeholder year (e.g., 2000) to the dates
        $startDate = Carbon::createFromFormat('m/d', $request->start_date)->year(2000);
        $endDate = Carbon::createFromFormat('m/d', $request->end_date)->year(2000);

        $season->update([
            'name' => $request->name,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        return redirect()->route('seasons.index')->with('success', 'Season updated successfully.');
    }

    // Remove the specified season from the database
    public function destroy(Season $season)
    {
        $season->delete();
        return redirect()->route('seasons.index')->with('success', 'Season deleted successfully.');
    }
}//
