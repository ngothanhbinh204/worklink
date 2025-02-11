<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $gender
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicInfo whereUserId($value)
 * @mixin \Eloquent
 */
class BasicInfo extends Model
{
    use HasFactory;
    public $table = 'basic_info';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'created_at',
        'updated_at',
    ];

    public function contactInfo() {
        return $this->hasOne(ContactInfo::class, 'user_id', 'user_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}