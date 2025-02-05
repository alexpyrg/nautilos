@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">User Settings</h1>

            <!-- Change Password -->
            <div class="mb-6">
                <h2 class="text-xl font-medium text-gray-800 mb-4">Change Admin Password</h2>
                <form method="post" action="/admin/settings/change-password" class="space-y-4">
                    @csrf

                    <!-- Old Password -->
                    <div>
                        <label for="old_password" class="block text-sm font-medium text-gray-700">Old Password</label>
                        <input type="password" id="old_password" name="old_password" placeholder="Enter your old password"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('old_password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter your new password"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('new_password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your new password"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('confirm_password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Save Button -->
                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-md shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
