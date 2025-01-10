<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'skill_name'];

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function category()
    {
        return $this->belongsTo(CategoriesSkill::class, 'category_id');
    }

    public function recommendationSkills()
    {
        return $this->hasMany(UserRecommendationSkill::class, 'skill_id');
    }
}