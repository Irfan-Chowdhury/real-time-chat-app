
<div align="center">

<h1> 💬 Real-Time Chat Application</h1>

</div

A real-time private messaging system built using **Laravel**, **Vue.js**, and **Pusher**, featuring real-time communication, typing indicators, and unread message counts.

---

<br>

## Features

✅ Authenticated user system (Laravel Breeze - API)  
✅ One-to-one real-time private chat  
✅ Unread message count beside users  
✅ Timestamp for each message  
✅ Auto-scroll and loading indicators  
✅ RESTful APIs for messaging and user list (except self)

---

<br>

## Technologies & Tools Used

### Backend
- **PHP-8.2**
- **Laravel 12**
- **Laravel Breeze** – For authentication
- **Laravel Broadcasting** – For real-time events
- **Pusher** – WebSocket-based real-time messaging
- **MySQL** – Message and user data storage

### Frontend
- **Vue.js 3** 
- **Vite** – Lightning-fast development
- **Axios** – HTTP client
- **Laravel Echo + Pusher** – For listening to broadcast events
- **Bootstrap 4** – UI styling

### Decisions Made
- Utilized **Laravel Events and Broadcasting** to keep backend scalable and decoupled.
- Messages are stored in DB for persistence and future loading.
- Optimized message scroll and real-time update for smooth UX.

---

<br>


## Architecture & Folder Structure

### Backend (Laravel)
```

/app
├── Events/MessageSent.php         # Broadcasts message event
├── Http/Controllers/API/
      ├── Auth/AuthenticatedSessionController.php # Handles User Authentication 
      ├── ChatController.php       # Handles sending and 
      ├── DashboardController.php  # To view the dashboard
├── Models
   ├──ChatMessage.php         # Message model
   ├──User.php                # User model
/config
└── broadcasting.php               # Pusher configuration
/routes
├── auth.php                        # Authentication related routes
├── web.php                        # Web routes

```

### Frontend (Vue 3 + Vite)
```
/resources
   └── js
      ├── components/
      │     ├── ChatBox.vue              # Displays chat messages
      ├── app.js                         # Vue app entry point
   └── views
      ├── auth/login                     # Login Page
      ├── layouts                        # Layout of the chat app page
      ├── chat.blade.php                 # Main component of chat page
      ├── dashboard.blade.php            # The dashboard page
```

---

<br>


## Getting Started

### 1. Clone the Repository

```bash
git clone git@github.com:Irfan-Chowdhury/real-time-chat-app.git
cd real-time-chat-app
```

### 2. Install Dependencies

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### 3. Environment Configuration

Update your `.env` with the following:

```env
APP_URL=http://127.0.0.1:8000


# Broadcasting
BROADCAST_CONNECTION=pusher

DB_CONNECTION=mysql
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password

PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=your_app_cluster
```

---

### 4. Database Setup

```bash
php artisan migrate --seed
```
---

### 5. Run the Application


```bash
npm run dev
php artisan queue:listen
php artisan serve
```
<!-- php artisan breeze:install blade -->

---



### 6. Test by PEST Framework (Optional)

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

<br>

## Credentials 


### User -1
Open with normal window.

    - Email: admin@gmail.com
    - Password : admin12345

### User -2
Open with private window.

    - Email: user123@gmail.com
    - Password : user12345

---

<br>


## Screenshots Of Testing

### ChatServiceTest

![Chat App ChatServiceTest](https://snipboard.io/RazrTA.jpg)


### Dashboard Test

![Dashboard Test](https://snipboard.io/JSGLfE.jpg)

> Authenticated user can view dashboard and see users list


### Chat Page Test

![Dashboard Test](https://snipboard.io/J0Q1NS.jpg)

> Chat page loads with user and users list using ChatService


---

<br>

## 📸 Screenshots Of Chat Application

### With Notification

![Notification](https://snipboard.io/UHR9lX.jpg)


### Conversation between two persons

![Conversations](https://snipboard.io/Kj8JFE.jpg)




---


## License

This project is open-source and available under the [MIT license](LICENSE).

---

## Credits

* [Laravel](https://laravel.com/)
* [Vue.js](https://vuejs.org/)
* [Pusher](https://pusher.com/)
* [Laravel Echo](https://laravel.com/docs/broadcasting)

