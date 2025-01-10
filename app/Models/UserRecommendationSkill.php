<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $recommendation_id
 * @property int $skill_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserRecommendation $recommendation
 * @property-read \App\Models\Skill $skill
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill whereRecommendationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendationSkill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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