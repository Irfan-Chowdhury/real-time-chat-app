// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


import './bootstrap';
import { createApp } from 'vue';
import ChatBox from './components/ChatBox.vue';

createApp({}).component('chat-box', ChatBox).mount('#app');




// import { createApp } from 'vue'
// import ChatBox from './components/ChatBox.vue'

// const app = createApp({});
// app.component('chat-box', ChatBox);
// app.mount('#app');

// createApp(ChatBox).mount('#chat-box');