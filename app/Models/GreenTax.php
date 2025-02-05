<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreenTax extends Model
{
    use HasFactory;
    protected $table = 'green_tax';

    protected $fillable = [
        'cost',
        'month'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];


}
