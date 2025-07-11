<?php

namespace App\Http\Controllers;

use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        $users->each(function ($user)  {
            $user->unread_count = ChatMessages::where('sender_id', $user->id)
                ->where('receiver_id', Auth::id())
                ->where('is_read', false)
                ->count();
        });

        return view('dashboard',compact('users'));
    }
}
