<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('', ['rooms' => Room::latest()->where('participant_id', Auth::id())->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
        ]);
        Room::created([
            'admin_id' => Auth::id(),
            'title' => $request->title,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('', ['room' => Room::find($id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
        ]);
        $room = Room::find($id)->frist();
        Gate::authorize('can-update-room', $room);
        $room->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        Gate::authorize('can-delete-room', $room);
        $room->destroy();
    }
}
