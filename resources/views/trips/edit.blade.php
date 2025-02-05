@extends('layouts.app')
@section('content')
<div>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Edit Trip Type</h2>
        <form action="{{ route('admin.trips.update', $tripType) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700 font-medium">Trip Type Name</label>
                <input type="text" name="name" value="{{ $tripType->name }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Update</button>
        </form>
    </div>
</div>
@endsection
