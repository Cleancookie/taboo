<div>
    <div class="card mb-3">
        <div class="card-header text-center">
            <h2 class="js-card-name">{{ $card?->name ?? 'No card loaded' }}</h2>
        </div>
        <div class="card-body">
            <ul class="js-banned-words-container">
                @foreach ($card?->banned_words ?? [] as $word)
                    <li>{{ $word }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <button wire:click="drawNewCard">get me a new word 😖</button>
        </div>
    </div>
</div>
