<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'number',
        'status',
        'name',
        'surname',
        'email',
        'email_confirmation',
        'telephone'  ,
        'check_in_date' ,
        'check_out_date',
        'person_title_id',
        'room_type_id',
        'nr_rooms',
        'address',
        'city',
        'country',
        'postal_code' ,
        'estimated_arrival_time',
        'special_request',
        'final_rate',
        'prepayment',
        'payment_status',
        'countryCode',
        'locale_id',
        'total_cost',
        'total_gov_tax'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function roomType()
    {
        return $this->belongsTo(roomType::class, 'room_type_id');
    }
}
