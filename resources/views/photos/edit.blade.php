@extends('layouts.app')

@section('content')
    <h1>Edit Photo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="album_code">Album</label>
            <select name="album_code" id="album_code">
                <option value="all" {{ $photo->album_code == 'all' ? 'selected' : '' }}>All</option>
                @foreach($albums as $album)
                    <option value="{{ $album->code }}" {{ $photo->album_code == $album->code ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
            @error('album_code')<span>{{ $message }}</span>@enderror
        </div>
        <div>
            <label>Current Photo</label><br>
            <img src="{{ asset('images/pageImages/'.$photo->image_path) }}" alt="Photo" width="150">
        </div>
        <div>
            <label for="photo">Change Photo (optional)</label>
            <input type="file" name="photo" id="photo">
            @error('photo')<span>{{ $message }}</span>@enderror
        </div>
        <h3>Alt Texts</h3>
        @foreach($locales as $locale)
            <div>
                <label for="alt_{{ $locale->code }}">Alt ({{ $locale->code }})</label>
                <input type="text" name="alt_{{ $locale->code }}" id="alt_{{ $locale->code }}" value="{{ old('alt_'.$locale->code, $photoAlt[$locale->code] ?? '') }}">
                @error('alt_'.$locale->code)<span>{{ $message }}</span>@enderror
            </div>
        @endforeach
        <button type="submit">Update Photo</button>
    </form>
@endsection
