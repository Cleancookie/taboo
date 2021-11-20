<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\User;
use Livewire\Component;

class RoomControls extends Component
{
    public Room $room;

    public function render()
    {
        return view('livewire.room-controls');
    }

    public function joinGuessers()
    {
        $user = auth()->user();
        $this->room->guessers()->attach($user);
        $this->emit('Room:Guessers:Updated');
    }

    public function joinSpeakers()
    {
        $user = auth()->user();
        $this->room->speakers()->attach($user);
        $this->emit('Room:Speakers:Updated');
    }

    public function leaveGuessers()
    {
        $user = auth()->user();
        $this->room->guessers()->detach($user);
        $this->emit('Room:Guessers:Updated');
    }

    public function leaveSpeakers()
    {
        $user = auth()->user();
        $this->room->speakers()->detach($user);
        $this->emit('Room:Speakers:Updated');
    }
}

