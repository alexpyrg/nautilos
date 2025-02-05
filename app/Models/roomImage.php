<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class roomImage extends Model
{
    use HasFactory;

    protected $table = 'room_images';

    protected $fillable = [
        'image_path',
        'page_id',
        'is_enabled',
        'alt'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];

    public function page() : BelongsTo {
        return $this->belongsTo(Page::class, 'page_id','id');
    }//roomType relation

}
