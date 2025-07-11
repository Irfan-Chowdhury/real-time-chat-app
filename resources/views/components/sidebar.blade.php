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
