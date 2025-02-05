<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class PageContent extends Model
{
    use HasFactory;

    protected $table = 'page_content';

    protected $fillable = [
        'url',
        'title',
        'description',
        'keywords',
        'content',
        'locale_id',
        'page_id',
        'display_name',
        'custom_css',
        'custom_js',
        'custom_head_content',
        'page_layout_type'

    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function locale(){
        return $this->belongsTo(Locale::class);
    }

}
