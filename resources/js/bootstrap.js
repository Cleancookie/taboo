/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

const roomId = document.querySelector('.js-room-id').value;
if (roomId) {
    window.Echo.private(`Room.${roomId}`)
        .listen('ScoreUpdatedEvent', (data) => {
            console.log('ScoreUpdatedEvent')
            window.Livewire.emitTo('play-area', 'refreshScore')
        })
        .listen('NewCardEvent', (data) => {
            console.log('NewCardEvent')
            window.Livewire.emitTo('lw-card', 'refreshCard')
        })
    ;
}

