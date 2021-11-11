<?php

use App\Events\ScoreUpdatedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/room/{room}', [\App\Http\Controllers\RoomController::class, 'show']);
Route::post('/room/{room}/guess', [\App\Http\Controllers\RoomController::class, 'guess']);

Route::get('/test/{id}', function(Request $request) {
    ScoreUpdatedEvent::dispatch(
        \App\Models\Room::query()->where('id', ($request->get('id', 1)))->first()
    );
});
