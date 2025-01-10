<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        // Thêm các trường mặc định
    ];

    protected $guarded = [];
}