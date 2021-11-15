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

    public function render()
    {
        return view('livewire.lw-card');
    }

    public function getListeners()
    {
        return [
            'echo:Room' . $this->room->id . ',NewCardEvent' => 'refreshCard',
            'refreshCard' => 'refreshCard',
        ];
    }

    public function refreshCard()
    {
        $this->room->refresh();
        $this->card = $this->room->card;
    }

    public function drawNewCard()
    {
        // todo optimise this by counting and then getting selecting from card where id > x
        $this->card = Card::query()->select()->get()->random();
        $this->room->card_id = $this->card->id;
        $this->room->save();
        NewCardEvent::dispatch($this->room);
    }
}
