<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedUser extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}