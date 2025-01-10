<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $organization_name
 * @property string|null $role
 * @property string|null $location
 * @property string $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereOrganizationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserVolunteering whereUserId($value)
 * @mixin \Eloquent
 */
class UserVolunteering extends Model
{
    protected $fillable = [
        'user_id',
        'organization_name',
        'role',
        'location',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}