@extends('layouts.app')
@section('content')

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Προσθήκη τιμών</h2>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('trip-prices.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Trip Type -->
            <div>
                <label class="block text-gray-700 font-medium">Trip Type</label>
                <select id="trip_type" name="trip_type_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    <option value="" disabled selected>Επιλέξτε Ταξίδι</option>
                    @foreach ($tripTypes as $tripType)
                        <option value="{{ $tripType->id }}">{{ $tripType->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Season -->
            <div>
                <label class="block text-gray-700 font-medium">Σεζον</label>
                <select id="season" name="season_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    <option value="" disabled selected>Επιλέξτε Σεζον...</option>
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- One Price -->
            <div>
                <label class="block text-gray-700 font-medium">Τιμή Φιξ (€)</label>
                <input type="number" id="one_price" name="one_price" min="0" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Price Per Adult -->
            <div>
                <label class="block text-gray-700 font-medium">Τιμή για ενήλικες και 12+ (€)</label>
                <input type="number" id="price_per_adult" name="price_per_adult" min="0" step="0.01" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Price Per Child -->
            <div>
                <label class="block text-gray-700 font-medium">Τιμή για παιδιά (€)</label>
                <input type="number" id="price_per_child" name="price_per_child" min="0" step="0.01" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Αποθήκευση
            </button>
        </form>


    </div>

    <!-- Existing Trip Prices Table -->
    <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Λίστα τιμών</h2>

        @if($tripPrices->isEmpty())
            <p class="text-gray-500">Δεν υπάρχουνε τιμές.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Ταξίδι</th>
                    <th class="border border-gray-300 px-4 py-2">Σεζον</th>
                    <th class="border border-gray-300 px-4 py-2">Τιμή Φιξ (€)</th>
                    <th class="border border-gray-300 px-4 py-2">Τιμή για ενήλικες και 12+ (€)</th>
                    <th class="border border-gray-300 px-4 py-2">Τιμή για παιδιά (€)</th>
                    <th class="border border-gray-300 px-4 py-2">Επιλογές</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tripPrices as $tripPrice)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $tripPrice->tripType->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $tripPrice->season->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $tripPrice->one_price ? number_format($tripPrice->one_price, 2) : '-' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $tripPrice->one_price ? '-' : number_format($tripPrice->price_per_adult, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $tripPrice->one_price ? '-' : number_format($tripPrice->price_per_child, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('trip-prices.destroy', $tripPrice->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">Διαγραφή</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let onePriceInput = document.getElementById("one_price");
            let pricePerAdultInput = document.getElementById("price_per_adult");
            let pricePerChildInput = document.getElementById("price_per_child");

            function toggleFields() {
                if (onePriceInput.value) {
                    pricePerAdultInput.disabled = true;
                    pricePerChildInput.disabled = true;
                } else {
                    pricePerAdultInput.disabled = false;
                    pricePerChildInput.disabled = false;
                }
            }

            onePriceInput.addEventListener("input", toggleFields);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let tripTypeSelect = document.getElementById("trip_type");
            let seasonSelect = document.getElementById("season");

            // Priced seasons for each trip_type (loaded from PHP)
            let pricedSeasonsByTripType = @json($pricedSeasonsByTripType);

            tripTypeSelect.addEventListener("change", function () {
                let selectedTripType = this.value;

                // Enable all seasons first
                seasonSelect.querySelectorAll("option").forEach(option => {
                    option.disabled = false;
                });

                // Disable already priced seasons for selected trip type
                if (pricedSeasonsByTripType[selectedTripType]) {
                    let pricedSeasons = pricedSeasonsByTripType[selectedTripType];

                    seasonSelect.querySelectorAll("option").forEach(option => {
                        if (pricedSeasons.includes(parseInt(option.value))) {
                            option.disabled = true;
                        }
                    });
                }
            });
        });
    </script>

@endsection
