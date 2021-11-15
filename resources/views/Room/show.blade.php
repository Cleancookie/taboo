<x-layouts.main>
    <input type="hidden" value="{{ $room->id }}" class="js-room-id">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <livewire:lw-card :room="$room" :card="$card" />

                <livewire:play-area :room="$room"/>
            </div>
        </div>
    </div>
</x-layouts.main>
