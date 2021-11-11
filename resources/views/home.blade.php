@extends('layouts.app')

@section('content')
    <input type="hidden" class="hidden js-room-id" value="{{$room->id}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <span class="card-title">{{ $card->name  }}</span>
                    <ul>
                        @foreach ($card->banned_words as $word)
                            <li>{{ $word }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <form action="#" class="form js-guess-form">
                    <div>Guess: <input type="text" class="js-guess"></div>
                    <button class="btn btn-success">Guess!</button>
                </form>
                <div>Score: <span class="js-score">null</span></div>
                <button class="btn btn-primary">Correct</button>
                <button class="btn btn-danger">Skip</button>
            </div>
        </div>
    </div>
</div>
@endsection
