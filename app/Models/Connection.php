<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
