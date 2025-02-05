<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonTitle extends Model
{
    use HasFactory;

    protected $table='person_title';

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
      'title'
    ];
}
