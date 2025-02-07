<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Only letters, numbers, underscores or hyphens; no spaces.
            'code' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9_-]+$/', 'unique:albums,code'],
        ]);

        Album::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('success', 'Album created successfully.');
    }

    public function edit(Album $album)
    {
        return view('backoffice.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9_-]+$/', 'unique:albums,code,'.$album->id],
        ]);

        $album->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->back()->with('success', 'Album deleted successfully.');
    }
}
