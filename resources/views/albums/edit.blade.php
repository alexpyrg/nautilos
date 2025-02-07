@extends('layouts.app')

@section('content')
    <h1>Edit Album</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('albums.update', $album->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Album Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $album->name) }}">
            @error('name')<span>{{ $message }}</span>@enderror
        </div>
        <div>
            <label for="code">Album Code</label>
            <input type="text" name="code" id="code" value="{{ old('code', $album->code) }}">
            @error('code')<span>{{ $message }}</span>@enderror
        </div>
        <button type="submit">Update Album</button>
    </form>
@endsection
