<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    use HasFactory;

    protected $table = 'carousel_images';

    protected $fillable = [
        'carousel_id',
        'image_path',
        'order'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function carousel()
    {
        return $this->belongsTo(Carousel::class);
    }

    public function captions()
    {
        return $this->hasMany(CarouselImageCaption::class);
    }

}
