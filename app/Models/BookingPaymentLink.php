<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPaymentLink extends Model
{
    use HasFactory;

    protected $table = 'booking_payment_links';

    protected $fillable = [
      'booking_id',
      'token',
      'expires_on',
      'expired'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
