<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Cookie;

class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        // Clear session
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();


        return redirect('/login');
    }
}
