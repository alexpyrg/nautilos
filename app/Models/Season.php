<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';

    protected $fillable = ['name', 'start_date', 'end_date'];

    public function prices()
    {
        return $this->hasMany(TripPrice::class);
    }

    public static function findSeasonByDate($date)
    {
        return self::where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->first();
    }
}
