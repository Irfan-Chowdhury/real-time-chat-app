<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }
        .min-vh-80 {
            min-height: 80vh;
        }
        .sidebar {
            max-height: 100%;
            overflow-y: auto;
        }
        .active-chat {
            background-color: #e9f5ff;
        }
        .unread-highlight {
            background-color: #d6d8db;
        }
    </style>
</head>
<body>
    <div id="app" class="bg-light min-vh-100 d-flex flex-column">
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 w-auto text-white" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'font-weight-bold' : '' }}" href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Optional Header --}}
        @isset($header)
            <header class="bg-white border-bottom shadow-sm py-3">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Main --}}
        <main class="flex-grow-1 py-4">
            <div class="container">
                <div class="row min-vh-80">

                    {{-- Sidebar --}}
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-primary text-white font-weight-bold">
                                Contacts
                            </div>
                            <div class="sidebar">
                                <ul class="list-group list-group-flush">
                                    @foreach ($users as $user)
                                        <li class="list-group-item p-0
                                            {{ request()->routeIs('chat') && request()->route('chat') == $user->id ? 'active-chat' : '' }}
                                            {{ !empty($user->unread_count) && $user->unread_count > 0 ? 'unread-highlight font-weight-bold' : '' }}">
                                            <a href="{{ route('chat', $user) }}" class="d-flex justify-content-between align-items-center px-3 py-3 text-decoration-none text-body hover-bg-light">
                                                <div>
                                                    <div class="text-dark">{{ $user->name }}</div>
                                                    <div class="small text-muted">{{ $user->email }}</div>
                                                </div>

                                                @if(!empty($user->unread_count) && $user->unread_count > 0)
                                                    <span class="badge badge-danger badge-pill">
                                                        {{ $user->unread_count }}
                                                    </span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
