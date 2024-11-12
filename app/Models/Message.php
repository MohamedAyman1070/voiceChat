<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUuid;
    public $fillable = [
        'text',
        'user_id',
        'room_id'
    ];

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
