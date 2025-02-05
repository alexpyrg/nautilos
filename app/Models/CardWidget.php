<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardWidget extends Model
{
    use HasFactory;

    protected $table = 'card_widgets';
    protected $fillable = [
        'title',
        'order',
        'roomType_id',
        'image_path'
    ];

    public function contents(){
       return $this->hasMany(CardWidgetsContent::class, 'card_widget_id');
    }

    public function roomType(){
        return $this->belongsTo(roomType::class, 'roomType_id');
    }
}


