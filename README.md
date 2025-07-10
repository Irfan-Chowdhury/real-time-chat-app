
# 💬 Real-Time Private Chat Application

A full-stack private chat application using **Laravel 12**, **Vue 3**, **Pusher**. Authenticated users can send and receive messages in real-time using private channels. Vue is used for the real-time chat component, while Blade handles all other views.

---

## 📌 Features

- ✅ User authentication (Laravel Breeze + Sanctum)
- ✅ List of all users (except self)
- ✅ One-to-one private chat
- ✅ Real-time messaging with Pusher & Laravel Echo
- ✅ Messages stored in database
- ✅ Vue 3-powered chat module (Composition API)
- ✅ Blade used for all other pages
- ✅ Auto-scroll, message timestamps, loading states
- ✅ Secure API (protected via Sanctum middleware)

---

## 🧰 Tech Stack

| Layer        | Tools                                  |
|--------------|-----------------------------------------|
| Backend      | Laravel 12           |
| Frontend     | Blade + Vue 3                           |
| Real-Time    | Laravel Echo, Pusher                    |
| Auth         | Laravel Breeze (Blade stack)            |
| Database     | MySQL      |
| Dev Tools    | Vite, Axios, Postman                    |

---

## 🚀 Getting Started

### 1. 🔄 Clone the Repository

```bash
git clone https://github.com/your-username/chat-app.git
cd chat-app
````

### 2. ⚙️ Install Dependencies

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### 3. 🛠️ Environment Configuration

Update your `.env` with the following:

```env
APP_URL=http://127.0.0.1:8000


# Broadcasting
BROADCAST_CONNECTION=pusher

PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=your_app_cluster

# Vite access
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

---

### 4. 🧱 Database Setup

```bash
php artisan migrate
```

(Optional) Seed users manually or via factory.

---

### 5. 🔑 Authentication (Laravel Breeze)

Install and build Breeze Blade stack:

```bash
php artisan breeze:install blade
npm run dev
php artisan queue:listen
php artisan serve
```

---

### 6. 🔌 Install Real-Time Dependencies

```bash
# Laravel broadcasting server
composer require pusher/pusher-php-server

# Client-side Echo
npm install laravel-echo pusher-js
```

In `resources/js/bootstrap.js`, add:

```js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
```

---

<!-- ### 7. 📡 Authorize Broadcast Channels

In `routes/channels.php`:

```php
use Illuminate\Http\Request;

Broadcast::channel('chat.{receiverId}', function (Request $request, $receiverId) {
    return (int) $request->user()->id === (int) $receiverId;
});
```

--- -->

### 8. 🖥️ Run Application

```bash
php artisan serve
npm run dev
```

Access the app at: [http://127.0.0.1:8000/chat](http://127.0.0.1:8000/chat)

---

## 📚 API Overview

All API endpoints are protected by `auth:sanctum`.

| Method | Endpoint             | Description                       |
| ------ | -------------------- | --------------------------------- |
| GET    | `/api/users`         | List all users (excluding self)   |
| GET    | `/api/messages/{id}` | Get all messages with user `{id}` |
| POST   | `/api/messages`      | Send a new message                |

---

## 💻 Folder Structure

```
resources/
├── js/
│   ├── app.js             # Vue entry
│   └── components/
│       └── ChatApp.vue    # Chat interface
routes/
├── web.php                # Web routes
└── channels.php           # Broadcast channel auth
app/
├── Events/MessageSent.php # Real-time event
├── Models/Message.php     # Message model
└── Http/
    └── Controllers/ChatController.php
```

---

## 🌟 Optional Enhancements

* Typing indicator ("User is typing...")
* Unread message count beside users
* Redis + Queue broadcasting
* Notification system
* Responsive layout for mobile devices

---

## 📸 Screenshots

> Add UI screenshots here for chat, user list, message bubbles, etc.

---

## 📜 License

This project is open-source and available under the [MIT license](LICENSE).

---

## 🙏 Credits

* [Laravel](https://laravel.com/)
* [Vue.js](https://vuejs.org/)
* [Pusher](https://pusher.com/)
* [Tailwind CSS](https://tailwindcss.com/)
* [Laravel Echo](https://laravel.com/docs/broadcasting)

```