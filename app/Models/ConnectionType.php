<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectionType extends Model
{
    //

    public function connections() {
        return $this->hasMany(Connection::class);
    }
}