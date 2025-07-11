
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="flex h-full min-h-[80vh]">
        <x-user-sidebar :users="$users" />

        <div class="flex-1 p-6 bg-white dark:bg-gray-800 shadow-md">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Dashboard</h3>
            <p class="text-gray-700 dark:text-gray-300">
                Welcome to your dashboard, {{ Auth::user()->name }}.
            </p>
        </div>
    </div>
</x-app-layout> --}}



{{-- @extends('layouts.app')
@section('content')
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body bg-white">
                    <h3 class="h5 font-weight-bold mb-3">Dashboard</h3>
                    <p class="text-muted">
                        Welcome to your dashboard, {{ Auth::user()->name }}.
                    </p>
                </div>
            </div>
        </div>
@endsection --}}




@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h3 class="h5 font-weight-bold mb-0">
                    <i class="fas fa-tachometer-alt text-primary mr-2"></i> Dashboard
                </h3>
            </div>
            <div class="card-body bg-white">
                <p class="text-muted">
                    👋 Welcome back, <strong>{{ Auth::user()->name }}</strong>! Here's your dashboard overview.
                </p>
                <hr>
                <p class="text-secondary">
                    You can use the sidebar to access chat and navigate through other features.
                </p>
            </div>
        </div>
    </div>
@endsection


