<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPrice extends Model
{
    use HasFactory;

    protected $table = 'trip_prices';

    protected $fillable = ['trip_type_id', 'season_id', 'price_per_adult', 'price_per_child', 'one_price'];

    public function tripType()
    {
        return $this->belongsTo(TripType::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
