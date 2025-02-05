<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyRate extends Model
{
    use HasFactory;

    protected $table = 'monthly_rates';

    protected $fillable = [
        'name',
        'number',
        'room_type_id',
        'rate'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

}
