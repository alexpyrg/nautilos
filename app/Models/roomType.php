<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';

    protected $fillable = [
        'name',
        'independent',
        'number',
        'bathroom',
        'kitchen',
        'is_available',
        'max_occupants'

    ];

    public function roomTranslations(){
        return $this->hasMany(RoomTranslations::class);
    }
}
