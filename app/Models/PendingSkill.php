<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $skill_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill whereSkillName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PendingSkill whereUserId($value)
 * @mixin \Eloquent
 */
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
