@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row flex flex-column">
            <h1>Rooms</h1>
            <ul>
                @foreach ($rooms as $room)
                    <li>
                        <a href="{{ route('room.show', $room->id) }}">
                            {{ $room->id }}: {{ $room->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
