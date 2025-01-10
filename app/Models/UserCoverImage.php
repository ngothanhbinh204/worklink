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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCoverImage whereUserId($value)
 * @mixin \Eloquent
 */
class UserCoverImage extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
    ];

       public function user()
    {
         return $this->belongsTo(User::class);
    }
}