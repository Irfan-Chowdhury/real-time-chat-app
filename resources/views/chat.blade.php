<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Chat with {{ $user->name }}
        </h2>
    </x-slot>

    <div class="flex h-full min-h-[80vh]">
        {{-- Sidebar with users --}}
        <x-user-sidebar :users="$users" />

        {{-- Main Chat Area --}}
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
</x-app-layout>



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