@extends('layouts.app')

@section('content')
    <h1>Photos Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Add New Photo</h2>
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="album_code">Album</label>
            <select name="album_code" id="album_code">
                <option value="all">All</option>
                @foreach($albums as $album)
                    <option value="{{ $album->code }}">{{ $album->name }}</option>
                @endforeach
            </select>
            @error('album_code')<span>{{ $message }}</span>@enderror
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
            @error('photo')<span>{{ $message }}</span>@enderror
        </div>
        <h3>Alt Texts</h3>
        @foreach($locales as $locale)
            <div>
                <label for="alt_{{ $locale->code }}">Alt ({{ $locale->code }})</label>
                <input type="text" name="alt_{{ $locale->code }}" id="alt_{{ $locale->code }}" value="{{ old('alt_'.$locale->code) }}">
                @error('alt_'.$locale->code)<span>{{ $message }}</span>@enderror
            </div>
        @endforeach
        <button type="submit">Add Photo</button>
    </form>

    <h2>Existing Photos</h2>
    <table border="1" cellpadding="5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Photo</th>
            <th>Alt Texts</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{ $photo->id }}</td>
                <td>{{ $photo->album_code }}</td>
                <td>
                    <img src="{{ asset('images/pageImages/'.$photo->image_path) }}" alt="Photo" width="100">
                </td>
                <td>
                    @php $alts = json_decode($photo->alt, true); @endphp
                    @if($alts)
                        @foreach($alts as $localeCode => $alt)
                            <strong>{{ $localeCode }}:</strong> {{ $alt }}<br>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a href="{{ route('photos.edit', $photo->id) }}">Edit</a>
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
