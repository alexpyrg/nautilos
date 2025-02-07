<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Allow mass assignment for the image file name, alt texts, and album code
    protected $fillable = ['image_path', 'alt', 'album_code'];

    /**
     * Cast the 'alt' field as an array.
     * We store multiple translations (per locale) in JSON format.
     */
    protected $casts = [
        'alt' => 'array',
    ];

    /**
     * Optionally, define the inverse relationship.
     * Since Photo stores an album_code, we can reference an Album using its code.
     * (If a photo’s album_code is 'all' then no corresponding Album may exist.)
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_code', 'code');
    }
}
