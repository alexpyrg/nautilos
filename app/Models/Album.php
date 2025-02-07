<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    // Allow mass assignment for name and code
    protected $fillable = ['name', 'code'];

    /**
     * Get the photos associated with this album.
     * Note: In our design, each Photo stores the album code.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_code', 'code');
    }
}
