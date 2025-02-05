<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    use HasFactory;

    protected $table = 'business_info';
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'analytics_id',
        'rate_calculation'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];
}
