<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasUuid;
    public $fillable = [
        'title',
        'admin_id',
    ];
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'room_id', 'participant_id');
    }
}
