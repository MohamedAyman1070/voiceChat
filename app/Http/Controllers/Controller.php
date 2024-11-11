<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;

class Controller
{
    public function test(Request $r)
    {
        broadcast(new TestEvent($r->message));
        return redirect()->back();
    }
}
