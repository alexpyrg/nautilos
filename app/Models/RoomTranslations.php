<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTranslations extends Model
{
    use HasFactory;

    protected $table = 'room_type_translation';

    protected $fillable = [
      'room_type_id',
      'locale_id',
      'name',
      'description',
    ];
}
