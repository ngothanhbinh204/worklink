<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $job_title
 * @property string|null $location
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserExperience whereUserId($value)
 * @mixin \Eloquent
 */
class UserExperience extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}