<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    use HasFactory;

    protected $table = 'page_images';
    protected $fillable = [
        'order',
        'page_id',
        'alt',
        'image_path',
        'is_enabled'
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];

    //later on create galleries ??view?? and keep each one ready to go?
    public function imageAlt(){
        return $this->hasMany(PageImageAlt::class, 'image_id');
    }
}
