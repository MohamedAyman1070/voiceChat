import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "6ba9918d2b84d58df61b",
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    // key: import.meta.env.VITE_PUSHER_APP_KEY,
    // cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

window.Echo.channel("channel").listen("TestEvent", (e) => {
    console.log(e.message);
});
