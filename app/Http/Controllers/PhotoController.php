<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;
use App\Models\Locale;

class PhotoController extends Controller
{
    public function index()
    {
        // Eager load album if needed
        $photos  = Photo::all();
        $albums  = Album::all();
        $locales = Locale::all();
        return view('backoffice.photos.index', compact('photos', 'albums', 'locales'));
    }

    public function store(Request $request)
    {
        // Get locale codes (assuming Locale has a “code” field)
        $locales = Locale::all()->pluck('code')->toArray();

        $rules = [
            'album_code' => 'nullable|string|exists:albums,code',
            'photo'      => 'required|image',
        ];

        foreach($locales as $locale) {
            $rules['alt_'.$locale] = 'nullable|string|max:255';
        }

        $data = $request->validate($rules);

        if ($request->hasFile('photo')) {
            $file     = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/pageImages'), $filename);
        }

        $photo = new Photo();
        $photo->image_path = $filename;
        // Use the provided album code or default to "all"
        $photo->album_code = $data['album_code'] ?? 'all';

        // Store per‑locale alt texts (for simplicity, saving as JSON)
        $altTranslations = [];
        foreach($locales as $locale) {
            $altTranslations[$locale] = $data['alt_'.$locale] ?? '';
        }
        $photo->alt = json_encode($altTranslations);
        $photo->save();

        return redirect()->back()->with('success', 'Photo added successfully.');
    }

    public function edit(Photo $photo)
    {
        $albums  = Album::all();
        $locales = Locale::all();
        $photoAlt = json_decode($photo->alt, true) ?? [];
        return view('backoffice.photos.edit', compact('photo', 'albums', 'locales', 'photoAlt'));
    }

    public function update(Request $request, Photo $photo)
    {
        $locales = Locale::all()->pluck('code')->toArray();
        $rules = [
            'album_code' => 'nullable|string|exists:albums,code',
            'photo'      => 'nullable|image',
        ];

        foreach($locales as $locale) {
            $rules['alt_'.$locale] = 'nullable|string|max:255';
        }

        $data = $request->validate($rules);

        if ($request->hasFile('photo')) {
            $file     = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/pageImages'), $filename);
            // Optionally remove the old file:
            if(file_exists(public_path('images/pageImages/'.$photo->image_path))){
                unlink(public_path('images/pageImages/'.$photo->image_path));
            }
            $photo->image_path = $filename;
        }

        $photo->album_code = $data['album_code'] ?? 'all';

        $altTranslations = [];
        foreach($locales as $locale) {
            $altTranslations[$locale] = $data['alt_'.$locale] ?? '';
        }
        $photo->alt = json_encode($altTranslations);
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Photo $photo)
    {
        // Optionally remove the file from disk
        if(file_exists(public_path('images/pageImages/'.$photo->image_path))){
            unlink(public_path('images/pageImages/'.$photo->image_path));
        }
        $photo->delete();
        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}
