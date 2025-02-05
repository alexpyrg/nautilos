{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--    <div class="mbfContainer">--}}


{{--        <form class="mainBackEndForm" style="padding: .5rem;" action="{{ route('rooms.translations.store', $room->id) }}" method="POST">--}}
{{--            @csrf--}}
{{--            <h2>Add Translations for Room: {{ $room->name }}</h2>--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @foreach ($locales as $locale)--}}
{{--                        <div class="mb-4">--}}


{{--                            @php--}}
{{--                                // Find existing translation for this locale (if any)--}}
{{--                                $translation = $translations->where('locale_id', $locale->id)->first();--}}
{{--                            @endphp--}}

{{--                            <div class="form-group-block">--}}
{{--                                <h3 style="margin:0;">{{ $locale->name }} Translation</h3>--}}
{{--                                <label for="name_{{ $locale->id }}">Room Name ({{ $locale->code }}):</label>--}}
{{--                                <input type="text" name="locales[{{ $locale->id }}][name]" style="width: 100%; box-sizing: border-box; display: block; position: relative; font-size: 18px; padding: .2rem;" class="form-control"--}}
{{--                                       value="{{ old('locales.' . $locale->id . '.name', $translation->name ?? '') }}">--}}
{{--                            </div>--}}

{{--                            <div class="form-group-block">--}}
{{--                                <label for="description_{{ $locale->id }}">Description ({{ $locale->code }}):</label>--}}
{{--                                <textarea name="locales[{{ $locale->id }}][description]" class="form-control" rows="3">{{ old('locales.' . $locale->id . '.description', $translation->description ?? '') }}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary" style="margin: .4rem;">Save Translations</button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Form Header -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Προσθήκη Μεταφράσεων για Δωμάτιο: {{ $room->name }}</h2>

            <!-- Form -->
            <form action="{{ route('rooms.translations.store', $room->id) }}" method="POST" class="space-y-6">
                @csrf

                <!-- Locale Translations -->
                @foreach ($locales as $locale)
                    <div class="border border-gray-300 rounded-lg p-4 shadow-sm">
                        @php
                            // Find existing translation for this locale (if any)
                            $translation = $translations->where('locale_id', $locale->id)->first();
                        @endphp

                            <!-- Locale Name -->
                        <h3 class="text-lg font-medium text-gray-700 mb-4">{{ $locale->name }} Μετάφραση</h3>

                        <!-- Room Name -->
                        <div class="mb-4">
                            <label for="name_{{ $locale->id }}" class="block text-gray-700 font-medium mb-2">Όνομα Δωματίου ({{ $locale->code }}):</label>
                            <input type="text" name="locales[{{ $locale->id }}][name]"
                                   class="w-full px-4 py-2 border border-gray-600 border-solid rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                   value="{{ old('locales.' . $locale->id . '.name', $translation->name ?? '') }}">
                        </div>
                    </div>
                @endforeach

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση Μεταφράσεων
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
