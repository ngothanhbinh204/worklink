<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Connection> $connections
 * @property-read int|null $connections_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConnectionType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConnectionType extends Model
{
    //

    public function connections() {
        return $this->hasMany(Connection::class);
    }
}