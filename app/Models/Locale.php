<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $table = 'locales';

    protected $fillable = [
        'code',
        'name',
        'is_enabled',
        'order'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
