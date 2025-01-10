<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecommendationSkill extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $fillable = ['recommendation_id', 'skill_id'];

    public function recommendation()
    {
        return $this->belongsTo(UserRecommendation::class, 'recommendation_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}