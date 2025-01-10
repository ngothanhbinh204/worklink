<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $website
 * @property string|null $social_links
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereSocialLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactInfo whereWebsite($value)
 * @mixin \Eloquent
 */
class ContactInfo extends Model
{
    use HasFactory;
    public $table = 'contact_info';

    public $fillable = [
        'user_id',
        'phone',
        'address',
        'website',
        'social_link',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
