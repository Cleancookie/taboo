<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class Room extends Component
{
    public \App\Models\Room $room;

    public Card $card;

    public function render()
    {
        return view('livewire.room');
    }
}
