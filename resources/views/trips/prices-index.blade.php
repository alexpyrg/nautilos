@extends('layouts.app')
@section('content')
<div>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Add Trip Price</h2>
        <form action="{{ route('trip-prices.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium">Trip Type</label>
                <select name="trip_type_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach ($tripTypes as $tripType)
                        <option value="{{ $tripType->id }}">{{ $tripType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Season</label>
                <select name="season_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Price Per Adult</label>
                <input type="number" name="price_per_adult" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Price Per Child</label>
                <input type="number" name="price_per_child" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Add Price</button>
        </form>
    </div>
</div>
@endsection
