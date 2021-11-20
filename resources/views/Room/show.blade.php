<x-layouts.main>
    <input type="hidden" value="{{ $room->id }}" class="js-room-id">
    <div class="container vh-100 d-flex align-items-center">
        <div class="row flex-grow-1 justify-content-center">
            <div class="col-md-8">
                <livewire:room :room="$room" />
            </div>
        </div>
    </div>
</x-layouts.main>
