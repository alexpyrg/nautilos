@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Table Header -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Λίστα Δωματίων</h2>

            <!-- Rooms Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Δωμάτιο</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-50">
                            <!-- Room Name -->
                            <td class="px-4 py-2 text-gray-700">{{ $room->name }}</td>

                            <!-- Actions -->
                            <td class="px-4 py-2">
                                <a href="/admin/rooms/translate/{{ $room->id }}" class="text-orange-500 hover:underline flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
