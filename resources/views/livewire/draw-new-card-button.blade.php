<div>
    <button
        wire:click="drawNewCard"
        wire:loading.class="d-none"
        class="btn btn-primary rounded-pill"
    >
        Draw new card
    </button>

    <button
        wire:loading
        class="btn btn-primary rounded-pill"
        type="button"
        disabled
    >
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading new card
    </button>
</div>
