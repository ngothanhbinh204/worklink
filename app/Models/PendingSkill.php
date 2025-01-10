<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingSkill extends Model
{

    use HasFactory;
     protected $fillable = ['user_id','skill_name'];
      public function user()
    {
          return $this->belongsTo(User::class);
    }

    protected $guarded = [];
}
