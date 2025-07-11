
# 💬 Real-Time Chat Application

A real-time private messaging system built using **Laravel**, **Vue.js**, and **Pusher**, featuring real-time communication, typing indicators, and unread message counts.


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
git clone git@github.com:Irfan-Chowdhury/real-time-chat-app.git
cd real-time-chat-app
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
npm run dev
php artisan queue:listen
php artisan serve
```
<!-- php artisan breeze:install blade -->

---

### 6. Testing (PEST Framework)

**Step 1:** Create the file

```bash
cp .env .env.testing 
```
or create manually 

**Step 2:** Edit `.env.testing`
Modify only the database section to use your test DB:


```env
DB_CONNECTION=mysql
DB_DATABASE=chat-app-test
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Step 3:** config cache (important)
```bash
php artisan config:clear
php artisan config:cache
```

**Step 4:** run your test
```bash
./vendor/bin/pest
```



---

<!-- ### 6. 🔌 Install Real-Time Dependencies

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

--- -->

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

Access the app at: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

---

---

<!-- ## 🌟 Optional Enhancements

* Typing indicator ("User is typing...")
* Unread message count beside users
* Redis + Queue broadcasting
* Notification system
* Responsive layout for mobile devices

--- -->

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