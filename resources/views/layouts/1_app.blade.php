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

    <style>
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }
    </style>
</head>
<body>
    <div id="app" class="bg-light min-vh-100 d-flex flex-column">
        {{-- Navigation --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 w-auto" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>

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

        @isset($header)
            <header class="bg-white border-bottom shadow-sm py-3">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset



        <main class="flex-grow-1 py-4">
            <div class="container">
                <div class="row min-vh-80">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="w-100 w-sm-25 bg-light border-right h-100 overflow-auto">
                                    <div class="card-header font-weight-bold">
                                        Contacts
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        @foreach ($users as $user)
                                            <li class="list-group-item p-0">
                                                <a href="{{ route('chat', $user) }}" class="d-block px-3 py-3 text-decoration-none text-body hover-bg-light">
                                                    <div class="font-weight-bold text-dark">{{ $user->name }}</div>
                                                    <div class="small text-muted">{{ $user->email }}</div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
