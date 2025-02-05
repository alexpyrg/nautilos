{{--@extends('layouts.cms')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>Manage Captions for Image</h1>--}}

{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <img src="{{ asset('images/cardImages/'. $image->image_path) }}" alt="Carousel Image" class="img-fluid mb-3">--}}

{{--                <form action="{{ route('carousel.images.store-or-update-caption', $image->id) }}" method="POST">--}}
{{--                    @csrf--}}

{{--                    @foreach($locales as $locale)--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="caption_{{ $locale->id }}">Caption ({{ $locale->code }})</label>--}}
{{--                            <textarea name="caption_{{ $locale->id }}" id="caption_{{ $locale->id }}" class="form-control" rows="2">{{ old('caption_' . $locale->id, $captions[$locale->id]->caption ?? '') }}</textarea>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                    <button type="submit" class="btn btn-primary">Αποθήκευση</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Manage Captions for Image</h1>

            <div class="mb-6">
                <img src="{{ asset('images/carouselImages/' . $image->image_path) }}" alt="Carousel Image" class="rounded-lg shadow-md max-w-full">
            </div>

            <form action="{{ route('carousel.images.store-or-update-caption', $image->id) }}" method="POST" class="space-y-6">
                @csrf

                @foreach($locales as $locale)
                    <div>
                        <label for="caption_{{ $locale->id }}" class="block text-gray-700 font-medium mb-2">Caption ({{ $locale->code }})</label>
                        <textarea name="caption_{{ $locale->id }}" id="caption_{{ $locale->id }}" rows="2"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700">{{ old('caption_' . $locale->id, $captions[$locale->id]->caption ?? '') }}</textarea>
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow w-full hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
