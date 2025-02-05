{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div>--}}
{{--        <h1> Δημιουργία εικόνας Carousel | {{ $page->name }}</h1>--}}
{{--        <form method="post" action="/easyupdate/carousel/image/save">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
{{--            <input type="hidden" name="carousel_id" value="{{ $carousel->id }}">--}}
{{--            <div class="input-group-block">--}}
{{--                <label> Εικόνα: </label>--}}
{{--                <input type="file" name="image" accept="image/*">--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--                <label> Caption: </label>--}}
{{--                <input type="text" name="caption">--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--                <label> Image Alt: </label>--}}
{{--                <input type="text" name="alt" value="">--}}
{{--            </div>--}}
{{--            <button type="submit">--}}
{{--                Αποθήκευση--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Δημιουργία εικόνας Carousel | {{ $page->name }}</h1>
            <form method="post" action="/admin/carousel/image/save" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Hidden Inputs -->
                <input type="hidden" name="page_id" value="{{ $page->id }}">
                <input type="hidden" name="carousel_id" value="{{ $carousel->id }}">

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-2">Εικόνα:</label>
                    <input type="file" name="image" accept="image/*" class="block w-full text-gray-700 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Caption -->
                <div>
                    <label for="caption" class="block text-gray-700 font-medium mb-2">Caption:</label>
                    <input type="text" name="caption" placeholder="Enter caption" class="block w-full text-gray-700 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Image Alt -->
                <div>
                    <label for="alt" class="block text-gray-700 font-medium mb-2">Image Alt:</label>
                    <input type="text" name="alt" placeholder="Enter alt text" class="block w-full text-gray-700 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
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
