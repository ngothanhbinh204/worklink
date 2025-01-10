<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $publisher
 * @property string $publication_date
 * @property string|null $description
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication wherePublicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPublication whereUserId($value)
 * @mixin \Eloquent
 */
class UserPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        // Thêm các trường mặc định
    ];

    protected $guarded = [];
}