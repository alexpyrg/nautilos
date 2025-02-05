<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    use HasFactory;

    protected $table = "payment_details";

    protected $fillable = [
        'card_number',
        'card_type',
        'card_exp_month',
        'card_exp_year',
        'card_cvv',
        'card_holder_name',
        'booking_id',
        'view_times',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}
