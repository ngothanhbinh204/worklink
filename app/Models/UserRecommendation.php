<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRecommendation extends Model
{
    protected $fillable = [
        'giver_id',
        'receiver_id',
        'recommendation_text',
    ];
    public function giver()
    {
        return $this->belongsTo(User::class, 'giver_id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
      public function skills()
    {
        return $this->hasMany(UserRecommendationSkill::class, 'recommendation_id');
    }
}
