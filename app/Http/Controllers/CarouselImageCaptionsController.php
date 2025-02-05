<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\CarouselImageCaption;
use App\Models\Locale;
use Illuminate\Http\Request;

class CarouselImageCaptionsController extends Controller
{
    // Display the form for adding/editing captions for all locales
    public function createOrEdit($imageId)
    {
        $image = CarouselImage::findOrFail($imageId);
        $locales = Locale::all();

        // Fetch existing captions for the image
        $captions = CarouselImageCaption::where('carousel_image_id', $imageId)->get()->keyBy('locale_id');

        return view('backend.components.carousel-captions-edit', compact('image', 'locales', 'captions'));
    }

    // Store or update captions for all locales
    public function storeOrUpdate(Request $request, $imageId)
    {
        $carouselImage = CarouselImage::findOrFail($imageId);
        $locales = Locale::all();

        // Validate the input for each locale's caption
        foreach ($locales as $locale) {
            $request->validate([
                'caption_' . $locale->id => 'nullable|string|max:255',
            ]);

            // Find or create the caption for the current locale
            CarouselImageCaption::updateOrCreate(
                [
                    'carousel_image_id' => $carouselImage->id,
                    'locale_id' => $locale->id,
                ],
                [
                    'caption' => $request->input('caption_' . $locale->id),
                ]
            );
        }

        return redirect()->route('carousel.images.show', $carouselImage->id)
            ->with('success', 'Captions updated successfully!');
    }

    // Show captions for the image
    //INACTIVE NOT NEEDED
    public function show($imageId)
    {
        $image = CarouselImage::findOrFail($imageId);

        return redirect('/easyupdate/carousel/images/view/' . $image->carousel_id )->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
        return view('carousel-images.show', compact('image'));
    }
}
