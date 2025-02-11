<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use HasFactory;

    protected $table = 'custom_pages';

    protected $fillable = [
        'name',
        'file',
        'description'
    ];
}
