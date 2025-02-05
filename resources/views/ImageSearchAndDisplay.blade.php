{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div class="isad-container">--}}

{{--        @foreach($images as $image)--}}
{{--        <div class="isad-card">--}}
{{--            <img class="isad-image" data-fancybox="gallery" src="{{ asset($image['base_path'] . '' .  $image['relative_path']) }}">--}}
{{--            <div class="isad-general-info">--}}
{{--                <div> <span>Dimensions:</span> <i>{{ $image['dimensions']}} pixels</i></div>--}}
{{--                <div> <span>Filename:</span> <i>{{ $image['filename']}}</i></div>--}}
{{--                <div> <span>Location:</span> <i>{{ $image['relative_path']}}</i></div>--}}
{{--                <div> <span>Extension:</span> <i>{{ $image['extension']}}</i></div>--}}
{{--                @if($image['size'] / 1000 < 1)--}}
{{--                    <div> <span>Size:</span> <i>{{ number_format($image['size'],2)}} Bytes</i></div>--}}
{{--                @elseif(($image['size'] / 1000000 < 1))--}}
{{--                    <div> <span>Size:</span> <i>{{ number_format($image['size'] / 1000,2)}} Kb</i></div>--}}
{{--                @else--}}
{{--                    <div> <span>Size:</span> <i>{{ number_format($image['size']/1000000,2)}} Mb</i></div>--}}
{{--                @endif--}}

{{--            </div>--}}

{{--            <div class="isad-buttons">--}}
{{--                <a href="{{ $image['delete_url'] }}" class="delete-button"> <span class="material-symbols-outlined"> delete </span> </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($images as $image)
        <div class="border flex flex-col justify-center rounded-lg shadow-lg p-4 bg-white">
            <img class="w-auto m-auto max-h-1/2" data-fancybox="gallery" src="{{ asset($image['base_path'] . '' .  $image['relative_path']) }}">
            <div class="text-gray-700 space-y-2">
                <div><span class="font-bold">Dimensions:</span> <i>{{ $image['dimensions']}} pixels</i></div>
                <div><span class="font-bold">Filename:</span> <i>{{ $image['filename']}}</i></div>
                <div><span class="font-bold">Location:</span> <i>{{ $image['relative_path']}}</i></div>
                <div><span class="font-bold">Extension:</span> <i>{{ strtoupper($image['extension']) }}</i></div>
                <div>
                    <span class="font-bold">Size:</span>
                    <i>
                        @if($image['size'] / 1000 < 1)
                            {{ number_format($image['size'],2)}} Bytes
                        @elseif(($image['size'] / 1000000 < 1))
                            {{ number_format($image['size'] / 1000,2)}} Kb
                        @else
                            {{ number_format($image['size']/1000000,2)}} Mb
                        @endif
                    </i>
                </div>
                <div><span class="font-bold">Uploaded:</span> <i>{{ $image['uploaded_at'] ?? 'N/A' }}</i></div>
{{--                <div><span class="font-bold">Access:</span> <i>{{ $image['is_public'] ? 'Public' : 'Private' }}</i></div>--}}
            </div>
            <div class="flex justify-end mt-4 space-x-2">
                <a href="{{ $image['delete_url'] }}" class="text-white bg-red-500 rounded text-center w-full p-2 text-lg hover:underline hover:bg-red-300">ΔΙΑΓΡΑΦΗ</a>
{{--                <a href="{{ $image['download_url'] }}" class="text-blue-500 hover:underline">Download</a>--}}
            </div>
        </div>
    @endforeach
</div>
@endsection
