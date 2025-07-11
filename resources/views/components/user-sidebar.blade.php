{{-- <div class="w-full sm:w-64 bg-gray-100 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 h-full overflow-y-auto">
    <div class="p-4 text-lg font-bold text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-700">
        Contacts
    </div>
    <ul class="divide-y divide-gray-300 dark:divide-gray-700">
        @foreach ($users as $user)
            <li>
                <a href="{{ route('chat', $user) }}"
                   class="block px-4 py-3 hover:bg-gray-200 dark:hover:bg-gray-800 transition">
                    <div class="font-semibold text-gray-800 dark:text-gray-100">{{ $user->name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                </a>
            </li>
        @endforeach
    </ul>
</div> --}}





<div class="w-100 w-sm-25 bg-light border-right h-100 overflow-auto">
    <div class="p-3 font-weight-bold border-bottom text-dark h5">
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
