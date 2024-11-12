<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($room_id)
    {
        Room::find($room_id)->participants()->updateExistingPivote(Auth::id(), ['displayed_at' => now()]);
        return view('', ['messages' => Message::latest()->where('room_id', $room_id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|min:3|max:100',
        ]);
        $message = Message::create([
            'text' => $request->text,
            'user_id' => Auth::id(),
        ]);
        Broadcast(new MessageController($message));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::find($id)->delete();
    }
}
