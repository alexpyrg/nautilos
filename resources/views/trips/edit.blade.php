@extends('layouts.app')
@section('content')

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Trip Type: {{ $trip->name }}</h2>

        <form action="{{ '/admin/trips/update/' . $trip->id }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Trip Type Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Trip Type Name</label>
                <input type="text" name="name" value="{{ old('name', $trip->name) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- Translations Table -->
            <h3 class="text-lg font-semibold mb-2">Translations</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Locale</th>
                    <th class="border border-gray-300 px-4 py-2">Translation</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($locales as $locale)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $locale->name }} ({{ $locale->code }})</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <input type="text" name="translations[{{ $locale->id }}]"
                                   value="{{ old('translations.' . $locale->id, $translationsByLocale[$locale->id] ?? '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Submit Button -->
            <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Save Changes
            </button>
        </form>
    </div>

@endsection
