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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/room', [\App\Http\Controllers\RoomController::class, 'index'])->name('home');
    Route::get('/room/{room}', [\App\Http\Controllers\RoomController::class, 'show'])->name('room.show');
    Route::post('/room/{room}/guess', [\App\Http\Controllers\RoomController::class, 'guess'])->name('room.guess');
    Route::post('/room/{room}/new-card', [\App\Http\Controllers\RoomController::class, 'newCard'])->name('room.new-card');
});
