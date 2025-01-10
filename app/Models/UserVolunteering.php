<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVolunteering extends Model
{
    protected $fillable = [
        'user_id',
        'organization_name',
        'role',
        'location',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}