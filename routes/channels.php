<?php

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('message.{room_id}', function (User $user, $room_id) {
    // if null do not broadcast
    return Room::find($room_id)->participants->where('id', $user->id)->first();
});
