<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;

class DrawNewCardButton extends Component
{
    public Room $room;

    public function render()
    {
        return view('livewire.draw-new-card-button');
    }

    public function drawNewCard()
    {
        $this->room->drawNewCard();
        $this->emit('newCard');
    }
}
