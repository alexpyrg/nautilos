<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $table="email_templates";

    protected $hidden=
        [
            'created_at',
            'updated_at',
            'id'
        ];

    protected $fillable=[
        'subject',
        'body',
        'addresses',
        'email_id',
        'locale_id'
    ];

    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id');
    }
}
