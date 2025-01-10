<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $category_id
 * @property string $skill_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoriesSkill $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserRecommendationSkill> $recommendationSkills
 * @property-read int|null $recommendation_skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereSkillName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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