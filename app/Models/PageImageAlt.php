<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageImageAlt extends Model
{
    use HasFactory;

    protected $table = 'page_image_alt';

    public $timestamps = false;
    protected $fillable = [
        'image_id',
        'locale_id',
        'alt'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function PageImage(){
        return $this->belongsTo(PageImage::class);
    }

}
