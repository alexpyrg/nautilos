<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPageContent extends Model
{
    use HasFactory;

    protected $table = 'custom_page_content';

    protected $fillable = [
      'content',
        'locale_id',
        'title',
        'url',
        'description',
        'keywords',
      'custom_page_id',
    ];
}
