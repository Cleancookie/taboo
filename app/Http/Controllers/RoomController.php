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
        return view('room.index', [
            'rooms' => Room::all(),
        ]);
    }

    public function show(Room $room)
    {
        return view('room.show', [
            'card' => $room->card,
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

    public function newCard(Room $room)
    {
        // todo optimise this by counting and then getting selecting from card where id > x
        $room->card_id = Card::query()->select(['id'])->get()->random()->id;
        $room->save();
        $room->refresh();
        NewCardEvent::dispatch($room);
        return $room;
    }
}
