<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $path
 * @property bool $is_primary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAvatar whereUserId($value)
 * @mixin \Eloquent
 */
class UserAvatar extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'path',
         'is_primary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
