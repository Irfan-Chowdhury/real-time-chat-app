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

        @include('components.navbar')

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
                    @include('components.sidebar')

                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
