<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Skill|null $skill
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserSkill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserSkill extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'skill_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}