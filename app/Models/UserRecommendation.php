<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $giver_id
 * @property int $receiver_id
 * @property string $recommendation_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $giver
 * @property-read \App\Models\User $receiver
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserRecommendationSkill> $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereGiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereRecommendationText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRecommendation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
