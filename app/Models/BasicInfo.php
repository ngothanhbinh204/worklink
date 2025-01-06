<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    public $table = 'basic_info';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
