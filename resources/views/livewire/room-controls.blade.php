<div>
    <button
        class="btn btn-primary"
        type="button"
        wire:loading.attr="disabled"
        wire:click="joinGuessers"
    >
        Join guessers
    </button>

    <button
        class="btn btn-danger"
        type="button"
        wire:loading.attr="disabled"
        wire:click="leaveGuessers"
    >
        Leave guessers
    </button>

    <button
        class="btn btn-primary"
        type="button"
        wire:loading.attr="disabled"
        wire:click="joinSpeakers"
    >
        Join speakers
    </button>

    <button
        class="btn btn-danger"
        type="button"
        wire:loading.attr="disabled"
        wire:click="leaveSpeakers"
    >
        Leave speakers
    </button>
</div>
