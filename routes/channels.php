<?php

// use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat', function ($user) {
    return Auth::check();
});


// Broadcast::channel('chat.{userId}', function ($user, $userId) {
//     return (int) $user->id === (int) $userId;
// });
