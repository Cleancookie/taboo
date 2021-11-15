 # Taboo
 
Laravel + [Pusher](https://pusher.com/) implementation of the card game Taboo.

## Setup 🔧

1. `mv .env.example .env`
1. Fill out the database details, and pusher credentials
1. `php artisan migrate:fresh` (with `--seed` for test data.  Login is `admin@example.com`/`password`)
1. `composer install`
1. `npm run dev`

To play a game, all players must register/log in (in the top right) and join the same room ie `/room/1`

All players are intended to use Discord

## Todo ✏️

- Route to create new room
- Secure rooms (require login to view them)
- Button to reset score
- Chat / Guess log

;
