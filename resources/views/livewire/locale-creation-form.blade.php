{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--<form>--}}
{{--    --}}{{-- <h2> Σε αυτή τη φόρμα δημιουργείτε νέες γλώσσες για τη σελίδα σας! </h2> --}}
{{--    <div class="input_group block">--}}
{{--        <label for="locale_code">Κωδικός (2 γράμματα): </label>--}}
{{--        <input type="text" maxlength="2" wire:model="code" name="code" placeholder="π.χ. ru, de, el, sv, fr.. ">--}}
{{--    </div>--}}
{{--    @error('code')--}}
{{--    <div> {{ $message }}</div>--}}
{{--    @enderror--}}
{{--    <div class="input_group block">--}}
{{--        <label for="locale_name"> Πλήρες όνομα:</label>--}}
{{--        <input type="text" wire:model="name" name="name">--}}
{{--    </div>--}}

{{--    @error('name')--}}
{{--        <div> {{ $message }}</div>--}}
{{--    @enderror--}}

{{--    <div class="input_group block">--}}
{{--        <label for="locale_name"> Φωτογραφία:</label>--}}
{{--        <input type="file" wire:model="photo">--}}
{{--    </div>--}}
{{--    <div class="input_group block">--}}
{{--    <button class="" wire:click.prevent="save"> Αποθήκευση </button>--}}
{{--    </div>--}}
{{--</form>--}}
{{--@endsection--}}
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Δημιουργία Νέας Γλώσσας</h2>

            <form >
                <!-- Locale Code -->
                <div class="mb-4">
                    <label for="locale_code" class="block text-gray-700 font-medium mb-2">Κωδικός (2 γράμματα):</label>
                    <input type="text" maxlength="2" wire:model="code" name="code"
                           placeholder="π.χ. ru, de, el, sv, fr.."
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @error('code')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Locale Name -->
                <div class="mb-4">
                    <label for="locale_name" class="block text-gray-700 font-medium mb-2">Πλήρες Όνομα:</label>
                    <input type="text" wire:model="name" name="name"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Save Button -->
                <div class="text-center">
                    <button type="button" wire:click.prevent="save"
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>
    </div>
