<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_name',
        'organization',
        'start_date',
        'end_date',
        'description',
    ];
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
