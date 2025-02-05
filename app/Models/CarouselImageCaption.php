<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImageCaption extends Model
{
    use HasFactory;

    protected $table = 'carousel_images_captions';


    protected $fillable = [
        'carousel_image_id',
        'locale_id',
        'caption'

    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function image()
    {
        return $this->belongsTo(CarouselImage::class);
    }
}
