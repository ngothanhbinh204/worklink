<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAvatar extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'path',
         'is_primary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
