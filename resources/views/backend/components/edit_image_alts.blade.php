@extends('layouts.cms')

@section('content')
    <h1>Edit Image Alts</h1>
    <div class="mbfContainer">
    <form action="{{ route('page_images.updateAlts') }}" class="mainBackEndForm" style="min-width: 400px;" method="POST">
        @csrf
        @foreach ($pageImages as $pageImage)
            <h3>Image ID: {{ $pageImage->id }}</h3>
            <img src="{{ asset('images/pageImages/'.$pageImage->image_path) }}" alt="{{ $pageImage->alt }}" style="width: 150px; height: auto;">

            @foreach ($locales as $locale)
                @php
                    // Fetch the alt text or initialize as empty if it doesn't exist
                    $alt = $pageImage->imageAlt->firstWhere('locale_id', $locale->id);
                @endphp

                <div class="input-group-block">
                    <label for="alt_{{ $pageImage->id }}_{{ $locale->id }}">
                        Alt Text ({{ $locale->name }}):
                    </label>
                    <textarea type="text"
                           name="alts[{{ $pageImage->id }}][{{ $locale->id }}]"
                           id="alt_{{ $pageImage->id }}_{{ $locale->id }}"
                           >{{ $alt ? $alt->alt : '' }} </textarea>
                </div>
            @endforeach
            <hr>
        @endforeach
        <button type="submit">Save Changes</button>
    </form>
    </div>
@endsection
