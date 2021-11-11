<?php

namespace App\Http\Controllers;

use App\Events\ScoreUpdatedEvent;
use App\Models\Card;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(Room $room)
    {
        $card = Card::all()->random();
        return view('home', [
            'card' => $card,
            'room' => $room,
        ]);
    }

    public function guess(Room $room)
    {
        $room->score++;
        $room->save();
        $room->refresh();
        ScoreUpdatedEvent::dispatch($room);
        return $room;
    }
}
