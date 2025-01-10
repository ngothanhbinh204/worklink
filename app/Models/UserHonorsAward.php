<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $issuing_organization
 * @property string $issue_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereIssuingOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserHonorsAward whereUserId($value)
 * @mixin \Eloquent
 */
class UserHonorsAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
         'issuing_organization',
         'issue_date',
         'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
