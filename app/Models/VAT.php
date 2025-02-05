<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VAT extends Model
{
    use HasFactory;

    protected $table = 'vat';

    protected $fillable = [
      'rate'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];
}
