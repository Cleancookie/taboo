<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $speaker = User::factory(1)->create([
            'name' => 'speaker 1',
            'email' => 'speaker@example.com',
            'password' => Hash::make('password'),
        ]);
        $guesser = User::factory(1)->create([
            'name' => 'guesser 1',
            'email' => 'guesser@example.com',
            'password' => Hash::make('password'),
        ]);
        $card = Card::factory(100)->create()->first();
        $rooms = Room::factory(10)->create([
            'card_id' => $card->id
        ]);

        $rooms->first()->speakers()->attach($speaker);
        $rooms->first()->guessers()->attach($guesser);
    }
}
