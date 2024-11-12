<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ParticapantController extends Controller
{
    public function subscribe(Request $r)
    {
        $r->validate([
            'code' => 'required|min:10',
        ]);

        $room = Room::find($r->code);
        Gate::authorize('can-subscribe', $room);
        $room->participants()->attach(Auth::id());
    }
    public function unsubscribe(Request $r)
    {
        $r->validate([
            'code' => 'required|min:10',
        ]);
        $room = Room::find($r->code);
        Gate::authorize('can-unsubscribe', $room);
        $room->participants()->detach(Auth::id());
    }
}
