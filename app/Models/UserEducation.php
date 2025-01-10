<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserEducation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserEducation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserEducation query()
 * @mixin \Eloquent
 */
class UserEducation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}