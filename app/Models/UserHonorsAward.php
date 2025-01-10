<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserHonorsAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
         'issuing_organization',
         'issue_date',
         'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
