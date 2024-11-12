<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticapantController extends Controller
{
    public function subscribe(Request $r)
    {
        $r->validate([
            'code' => 'required|min:10',
        ]);
        Room::find($r->code)->participants()->attach(Auth::id());
    }
    public function unsubscribe(Request $r)
    {
        $r->validate([
            'code' => 'required|min:10',
        ]);
        Room::find($r->code)->participants()->detach(Auth::id());
    }
}
