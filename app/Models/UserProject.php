<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    //

    protected $fillable = [
        'user_id',
         'project_name',
         'description',
        'start_date',
        'end_date',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}