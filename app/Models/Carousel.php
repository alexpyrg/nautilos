<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'carousels';

    protected $fillable = [
        'page_id',
        'is_enabled',
        'type' // type refers to big/small carousel. and is a number
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }
}
