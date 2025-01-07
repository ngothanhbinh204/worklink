<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public $table = 'contact_info';

    public $fillable = [
        'user_id',
        'phone',
        'address',
        'website',
        'social_link',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}