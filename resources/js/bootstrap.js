window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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
            console.log('score updated event')
            document.querySelector('.js-score').innerHTML = data.room.score;
        })
        .listen('NewCardEvent', (data) => {
            console.log('new card event')
            const card = data.card;
            document.querySelector('.js-card-name').innerHTML = card.name;
            document.querySelector('.js-banned-words-container').innerHTML = card.banned_words.map((banned_word) => {
                return `<li>${banned_word}</li>`;
            }).join('');
        })
    ;

    $('.js-guess-form').on('submit', (e) => {
        e.preventDefault();
        const guess = document.querySelector('.js-guess').value;
        axios({
            method: 'POST',
            url: `/room/${roomId}/guess`,
            data: {guess: guess},
        }).then(() => {
            document.querySelector('.js-guess').value = '';
        });
    })

    $('.js-new-card').on('click', (e) => {
        axios({
            method: 'POST',
            url: `/room/${roomId}/new-card`,
        });
    })
}

