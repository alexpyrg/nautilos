{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--    <style>--}}

{{--    </style>--}}

{{--<div class="mbfContainer"  >--}}

{{--    <form method="post" class="mainBackEndForm" action="/easyupdate/carousel/save">--}}
{{--        @csrf--}}
{{--        <h2 style=""> Δημιουργία Carousel --}}{{-- $page->name --}}{{--</h2>--}}
{{--        --}}{{----}}
{{--        <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
{{--        <div class="input-group-block">--}}
{{--            <label> Όνομα: </label>--}}
{{--            <select class="" style="font-size: 18px;">--}}
{{--                @if($filteredPages)--}}
{{--                    @foreach($filteredPages as $page)--}}
{{--                        <option value="{{ $page->id }}"> {{ $page->name }} </option>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="input-group-block" >--}}
{{--            <label> Σελίδα: </label>--}}
{{--            <select class="" name="page_id" style="font-size: 18px;">--}}
{{--                @if($filteredPages)--}}
{{--                    @foreach($filteredPages as $page)--}}
{{--                        <option value="{{ $page->id }}"> {{ $page->name }} </option>--}}
{{--                  @endforeach--}}
{{--                @endif--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="input-group-block" >--}}
{{--            <label for="is_enabled" style="display: inline-block;"> Εμφάνιση: </label>--}}
{{--            <input type="checkbox" name="is_enabled" id="is_enabled" style="display: inline-block;">--}}
{{--        </div>--}}
{{--        <div class="input-group-block">--}}
{{--            <label> Τύπος: </label>--}}
{{--            <select name="type" style="font-size: 18px;">--}}
{{--                <option value="1">Μικρό | 400 pixels</option>--}}
{{--                <option value="2">Μεγάλο | 600 pixels</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="input-group-block">--}}
{{--           --}}{{----}}
{{--            More features soon.--}}
{{--           --}}
{{--        </div>--}}
{{--        <button type="submit" style="">--}}
{{--            Αποθήκευση--}}
{{--        </button>--}}
{{--    </form>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Δημιουργία Carousel</h2>
            <form method="post" action="/admin/carousel/save" class="space-y-6">
                @csrf

                <!-- Page Selector -->
                <div>
                    <label for="page_id" class="block text-gray-700 font-medium mb-2">Σελίδα:</label>
                    <select name="page_id" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 text-gray-700">
                        @if($filteredPages)
                            @foreach($filteredPages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Is Enabled -->
                <div class="flex items-center">
                    <label for="is_enabled" class="text-gray-700 font-medium">Εμφάνιση:</label>
                    <input type="checkbox" name="is_enabled" id="is_enabled" class="ml-3 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- Type Selector -->
                <div>
                    <label for="type" class="block text-gray-700 font-medium mb-2">Τύπος:</label>
                    <select name="type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 text-gray-700">
                        <option value="1">Μικρό | 400 pixels</option>
                        <option value="2">Μεγάλο | 600 pixels</option>
                    </select>
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
