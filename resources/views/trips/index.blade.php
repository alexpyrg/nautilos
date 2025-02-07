@extends('layouts.app')
@section('content')
<div>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Δημιουργία Ταξιδιού</h2>
        <form action="{{ route('admin.trips.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium">Όνομα Ταξιδιού</label>
                <input type="text" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Αποθήκευση</button>
        </form>
    </div>
    <br>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Εγγραφές Ταξιδιών</h2>
{{--        <a href="{{ route('admin.trips.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Δημιουργία</a>--}}
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Όνομα</th>
                <th class="border border-gray-300 px-4 py-2">Επιλογές</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tripTypes as $tripType)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $tripType->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ '/admin/trips/edit/' . $tripType->id }}" class="bg-blue-600 hover:bg-blue-800 text-white p-2 rounded">Edit</a>
                        <form action="{{ route('admin.trips.destroy', $tripType) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-900 transition text-white p-1 rounded ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
