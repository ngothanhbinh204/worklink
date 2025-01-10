<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $project_name
 * @property string|null $description
 * @property string $start_date
 * @property string|null $end_date
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereProjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProject whereUserId($value)
 * @mixin \Eloquent
 */
class UserProject extends Model
{
    //

    protected $fillable = [
        'user_id',
         'project_name',
         'description',
        'start_date',
        'end_date',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
