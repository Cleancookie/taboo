<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function guessers()
    {
        return $this->belongsToMany(User::class, 'guessers');
    }

    public function speakers()
    {
        return $this->belongsToMany(User::class, 'speakers');
    }
}
