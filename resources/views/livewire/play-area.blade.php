<div>
    <div class="card">
        <div class="card-header text-center">
            <h2>Score: <span class="js-score">{{ $room->score ?? 'null' }}</span></h2>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="makeGuess">
                <div class="form-group">Guess: <input type="text" wire:model="guess"></div>
                <button type="submit" class="btn btn-success">Guess!</button>
            </form>
        </div>
    </div>
</div>
