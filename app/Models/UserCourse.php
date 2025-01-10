<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $course_name
 * @property string|null $organization
 * @property string $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereCourseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserCourse whereUserId($value)
 * @mixin \Eloquent
 */
class UserCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_name',
        'organization',
        'start_date',
        'end_date',
        'description',
    ];
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
