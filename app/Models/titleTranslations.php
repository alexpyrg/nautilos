<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titleTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mr',
        'mrs'
    ];

    protected $hidden = [
        'id'
    ];
}
