<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = "pages";

    protected $fillable = [
        'name',
        'file_name',
        'is_published',
        'is_home',
        'is_subpage',
        'has_subpages',
        'parent_page',
        'is_hardCoded',
        'has_reservationForm',
        'page_layout_type'
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function content()
    {
        return $this->hasMany(PageContent::class);
    }

//    public function subpages()
//    {
//        return $this->hasMany(Page::class, 'parent_id');
//    }
//
//    public function parent()
//    {
//        return $this->belongsTo(Page::class, 'parent_id');
//    }
}
