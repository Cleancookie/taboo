<?php

namespace App\Http\Livewire;

use App\Events\NewCardEvent;
use App\Models\Card;
use App\Models\Room;
use Livewire\Component;

class LwCard extends Component
{
    public Card $card;

    public Room $room;

    protected $listeners = [
        'newCard' => 'refreshCard'
    ];

    public function render()
    {
        return view('livewire.lw-card');
    }

    public function refreshCard()
    {
        $this->room->refresh();
        $this->card = $this->room->card;
    }
}
