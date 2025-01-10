<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $connection_type_id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $status
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ConnectionType $connectionType
 * @property-read \App\Models\User $receiver
 * @property-read \App\Models\User $sender
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ConnectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereConnectionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Connection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Connection extends Model
{
    //
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function connectionType() {
        return $this->belongsTo(ConnectionType::class);
    }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
