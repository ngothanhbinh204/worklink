<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $blocker_id
 * @property int $blocked_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser whereBlockedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser whereBlockerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlockedUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlockedUser extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'blocker_id',
        'blocked_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}