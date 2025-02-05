<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardWidgetsContent extends Model
{
    use HasFactory;

    protected $table = 'card_widgets_content';
    protected $fillable = [
        'card_widget_id',
        'locale_id',
        'title',
        'description',
        'feature_1',
        'feature_2',
        'feature_3',
        'book_now',
        'view_more',
        'view_more_link'
    ];

    public function cardWidget(){
      return $this->belongsTo(cardWidget::class);
    }


}
