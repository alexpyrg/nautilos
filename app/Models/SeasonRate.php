<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonRate extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at', 'id'];

    protected $table = 'season_rates';

    public function seasons(){
        $this->belongsTo(Season::class);
    }
    protected $fillable = [
        'season_id',
        'cost',
        'room_type_id'
    ];

}
