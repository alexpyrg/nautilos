<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPageImages extends Model
{
    use HasFactory;

    protected $table = 'custom_page_images';
    protected $fillable = [
        'image_path',
        'custom_page_id',
        'is_enabled'
    ];
}
