{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div>--}}

{{--    <div class="listedLocales" style="min-width: 800px;  display: block; position: relative; margin: 1rem auto; max-width: fit-content">--}}
{{--        @foreach($locales as $locale)--}}
{{--            @if($selected_locale->id == $locale->id)--}}
{{--                <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #0e415e; color: white; text-decoration: none" href="/easyupdate/cardWidget/edit/{{$card->id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>--}}
{{--            @else--}}
{{--                <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #1a9aef; color: white; text-decoration: none" href="/easyupdate/cardWidget/edit/{{$card->id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--<div class="mbfContainer">--}}
{{--        <form method="post" style="max-width: 700px;" class="mainBackEndForm" action="/easyupdate/cardWidget/edit/{{$card->id}}/{{$locale_code}}">--}}
{{--           @csrf--}}
{{--            <h2 style=""> Επεξεργασία Κάρτας | {{ $card->title }} </h2>--}}
{{--            <input type="hidden" name="locale" value="{{ strtolower($selected_locale->code) }}">--}}
{{--            <input type="hidden" name="card_id" value="{{ $card->id }}">--}}
{{--            <div class="input-group-block" >--}}
{{--                <label> Αριθμός Εμφάνισης Κάρτας: </label>--}}
{{--                <input name="order" value="{{ $card->order }}" style="width: 100%; box-sizing: border-box;">--}}
{{--            </div>--}}

{{--            <div class="input-group-block" >--}}
{{--                <label> Δωμάτιο: </label>--}}
{{--                <select class="" name="room_type" style="font-size: 18px;">--}}
{{--                        @foreach($rooms as $room)--}}
{{--                            <option value="{{ $room->id }}" @if($card->roomType_id == $room->id) selected @endif> {{ $room->name }} </option>--}}
{{--                        @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="is_enabled" style="display: inline-block;"> Τίτλος: </label>--}}
{{--                <input type="text" name="title" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->title : '' }}">--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="is_enabled" style="display: inline-block;"> Περιγραφή: </label>--}}
{{--                <textarea name="description" style="resize: none; height: 80px;">{{ $cardContent != null ? $cardContent->description : '' }}</textarea>--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="feature_1" style="display: inline-block;"> Αρ. Ατόμων: </label>--}}
{{--                <input type="text" name="feature_1" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->feature_1 : '' }}">--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="feature_2" style="display: inline-block;"> Τ.μ. Δωματίων: </label>--}}
{{--                <input type="text" name="feature_2" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->feature_2 : '' }}" >--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="feature_3" style="display: inline-block;"> Κρεβάτια: </label>--}}
{{--                <input type="text" name="feature_3" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->feature_3 : '' }}">--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="view_more" style="display: inline-block;"> Κουμπί | View More: </label>--}}
{{--                <input type="text" name="view_more" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->view_more : '' }} ">--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="view_more_link" style="display: inline-block;"> Κουμπί | View More LINK: </label>--}}
{{--                <input type="text" name="view_more_link" style="width: 100%; box-sizing: border-box;" value="{{ $cardContent != null ? $cardContent->view_more_link : '' }} ">--}}
{{--            </div>--}}

{{--            <div class="input-group-block" >--}}
{{--                <label for="book_now" style="display: inline-block;"> Κουμπί | Book Now: </label>--}}
{{--                <input type="text" name="book_now" style="width: 100%; box-sizing: border-box;" value="{{$cardContent != null ? $cardContent->book_now : '' }}">--}}
{{--            </div>--}}
{{--    --}}{{--        <div class="input-group-block">--}}
{{--    --}}{{--            <label> Τύπος Δωματίου: </label>--}}
{{--    --}}{{--            <select name="roomType" style="font-size: 18px;">--}}
{{--    --}}{{--                @foreach($rooms as $room)--}}
{{--    --}}{{--                    <option value="{{ $room->id }}"> {{ $room->name }} </option>--}}
{{--    --}}{{--                @endforeach--}}
{{--    --}}{{--            </select>--}}
{{--    --}}{{--        </div>--}}
{{--            <div class="input-group-block">--}}
{{--                --}}{{----}}
{{--                 More features soon.--}}
{{--                --}}
{{--            </div>--}}
{{--            <button type="submit" style="">--}}
{{--                Αποθήκευση--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <!-- Language Tabs -->
        <div class="flex justify-center space-x-4 mb-8">
            @foreach($locales as $locale)
                <a href="/admin/cardWidget/edit/{{$card->id}}/{{$locale->code}}"
                   class="px-4 py-2 text-center font-medium rounded-lg shadow
                      {{ $selected_locale->id == $locale->id ? 'bg-blue-600 text-white' : 'bg-blue-400 text-white hover:bg-blue-500' }}">
                    {{ $locale->code }}
                </a>
            @endforeach
        </div>

        <!-- Form Container -->
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="/admin/cardWidget/edit/{{$card->id}}/{{$locale_code}}" class="space-y-6">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Επεξεργασία Κάρτας | {{ $card->title }}</h2>

                <!-- Hidden Inputs -->
                <input type="hidden" name="locale" value="{{ strtolower($selected_locale->code) }}">
                <input type="hidden" name="card_id" value="{{ $card->id }}">

                <!-- Order -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Αριθμός Εμφάνισης Κάρτας:</label>
                    <input type="text" name="order" value="{{ $card->order }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Room -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Δωμάτιο:</label>
                    <select name="room_type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" @if($card->roomType_id == $room->id) selected @endif>{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Title -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Τίτλος:</label>
                    <input type="text" name="title" value="{{ $cardContent != null ? $cardContent->title : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Περιγραφή:</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ $cardContent != null ? $cardContent->description : '' }}</textarea>
                </div>

                <!-- Features -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Αρ. Ατόμων:</label>
                    <input type="text" name="feature_1" value="{{ $cardContent != null ? $cardContent->feature_1 : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Τ.μ. Δωματίων:</label>
                    <input type="text" name="feature_2" value="{{ $cardContent != null ? $cardContent->feature_2 : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Κρεβάτια:</label>
                    <input type="text" name="feature_3" value="{{ $cardContent != null ? $cardContent->feature_3 : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Buttons -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Κουμπί | View More:</label>
                    <input type="text" name="view_more" value="{{ $cardContent != null ? $cardContent->view_more : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Κουμπί | View More LINK:</label>
                    <input type="text" name="view_more_link" value="{{ $cardContent != null ? $cardContent->view_more_link : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Κουμπί | Book Now:</label>
                    <input type="text" name="book_now" value="{{ $cardContent != null ? $cardContent->book_now : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
