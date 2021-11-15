<?php

namespace App\Http\Livewire;

use App\Events\NewCardEvent;
use App\Events\ScoreUpdatedEvent;
use App\Models\Card;
use App\Models\Room;
use Livewire\Component;

class PlayArea extends Component
{
    public Room $room;

    public string $guess = '';

    public function render()
    {
        return view('livewire.play-area');
    }

    public function getListeners()
    {
        return [
            'refreshScore' => 'refreshScore',
        ];
    }

    public function makeGuess()
    {
        if ($this->room->card->name === $this->guess) {
            $this->room->score++;
            $this->room->card_id = Card::query()->select(['id'])->get()->random()->id;
            $this->room->save();
            $this->guess = '';
            NewCardEvent::dispatch($this->room);
            ScoreUpdatedEvent::dispatch($this->room);
        }
    }

    public function refreshScore()
    {
        $this->room->refresh();
    }
}
