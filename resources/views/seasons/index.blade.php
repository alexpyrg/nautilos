@extends('layouts.app')
@section('content')
<div>
    <!-- Season Creation Section -->
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Season Creation</h2>
        <form id="seasonForm" class="space-y-4" method="post" action="/admin/seasons">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium">Season Name</label>
                <input type="text" id="seasonName" name="name"required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">Start Date</label>
                <input type="text" id="startDate" name="start_date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 font-medium">End Date</label>
                <input type="text" id="endDate" name="end_date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Create</button>
        </form>
    </div>

    <!-- All Seasons Table -->
    <div class="max-w-3xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">All Seasons</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Start Date</th>
                <th class="border border-gray-300 px-4 py-2">End Date</th>
            </tr>
            </thead>
            <tbody id="seasonTable">
            @foreach($seasons as $season)
                <tr style="text-align: center;">
                    <td style="padding: .3rem;"> {{ $season->name }} </td>
                    <td style="padding: .3rem;"> {{ $season->start_date }} </td>
                    <td style="padding: .3rem;"> {{ $season->end_date }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Initialize Flatpickr on date inputs (set to MM/DD format)
        flatpickr("#startDate", {
            enableTime: false,
            dateFormat: "m/d",
            altInput: true,
            altFormat: "m/d",
        });
        flatpickr("#endDate", {
            enableTime: false,
            dateFormat: "m/d",
            altInput: true,
            altFormat: "m/d",
        });
    </script>

    <!-- Add CSRF Token for Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</div>
@endsection
