@extends('layouts.app')

@section('content')
    <h1>Albums</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Create Album</h2>
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Album Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')<span>{{ $message }}</span>@enderror
        </div>
        <div>
            <label for="code">Album Code</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}">
            @error('code')<span>{{ $message }}</span>@enderror
        </div>
        <button type="submit">Create Album</button>
    </form>

    <h2>Existing Albums</h2>
    <table border="1" cellpadding="5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{ $album->id }}</td>
                <td>{{ $album->name }}</td>
                <td>{{ $album->code }}</td>
                <td>
                    <a href="{{ route('albums.edit', $album->id) }}">Edit</a>
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline-block">
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
