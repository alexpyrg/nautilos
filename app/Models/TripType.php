<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TripType extends Model
{
    use HasFactory;

    protected $table = 'trip_types';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function prices()
    {
        return $this->hasMany(TripPrice::class);
    }
    public function translations()
    {
        return $this->hasMany(TripTypeTranslation::class);
    }
    public function translationFor($locale)
    {
        return $this->translations()->where('locale_id', $locale)->first();
    }
}//TripType
