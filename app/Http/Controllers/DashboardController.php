<?php

namespace App\Http\Controllers;

use App\Services\ChatService;

class DashboardController extends Controller
{
    public function index(ChatService $chatService)
    {
        $users = $chatService->getOtherUsersWithUnreadCounts();

        return view('dashboard', compact('users'));
    }
}
