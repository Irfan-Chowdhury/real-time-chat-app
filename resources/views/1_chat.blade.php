
{{-- This line is working --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Chat with {{ $user->name }}
        </h2>
    </x-slot>

    <div class="flex h-full min-h-[80vh]">
        <x-user-sidebar :users="$users" />

        <div class="flex-1 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden">
            <div id="app">
                <chat-box
                    :receiver='@json($user)'
                    :sender='@json(Auth::user())'
                />
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</x-app-layout> --}}






{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$user->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" id='app'>
                    <chat-box
                        :receiver = "{{ $user }}"
                        :sender = "{{ Auth::user() }}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



{{--
<div id="app">
    <chat-box></chat-box>
</div>

@vite(['resources/css/app.css', 'resources/js/app.js']) --}}












@extends('layouts.app')

@section('content')

<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            Chat with {{ $user->name }}
        </div>
        <div class="card-body bg-white p-4" style="overflow-y: auto;">
            <div id="app">
                <chat-box
                    :receiver='@json($user)'
                    :sender='@json(Auth::user())'
                />
            </div>
        </div>
    </div>
</div>

    @vite('resources/js/app.js')
@endsection

