<?php

namespace App\Http\Controllers;

use App\Events\NewCardEvent;
use App\Events\ScoreUpdatedEvent;
use App\Models\Card;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('Room.index', [
            'rooms' => Room::all(),
        ]);
    }

    public function show(Room $room)
    {
        return view('Room.show', [
            'card' => $room->card,
            'room' => $room,
        ]);
    }
}
