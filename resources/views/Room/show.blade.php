@extends('layouts.app')

@section('content')
    <input type="hidden" class="hidden js-room-id" value="{{$room->id}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                    <button class="js-new-card btn btn-danger container-fluid">get me a new word 😖</button>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h2>Score: <span class="js-score">null</span></h2>
                </div>
                <div class="card-body">
                    <form action="#" class="form js-guess-form">
                        <div class="form-group">Guess: <input type="text" class="js-guess form-control"></div>
                        <button type="submit" class="btn btn-success">Guess!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
