<div>
    <livewire:room-controls :room="$room" />
    @if (auth()->user()?->isSpeakerFor($room))
        <livewire:lw-card :room="$room" :card="$room->card" />
        <livewire:draw-new-card-button :room="$room" />
    @endif

    @if (auth()->user()?->isGuesserFor($room))
        <livewire:play-area :room="$room"/>
    @endif
</div>
