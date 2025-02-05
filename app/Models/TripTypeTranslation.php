<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripTypeTranslation extends Model
{
    protected $fillable = ['trip_type_id', 'locale_id', 'name', 'description'];

    public function tripType()
    {
        return $this->belongsTo(TripType::class);
    }
}
