<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl tracking-widest glowing-title">
            🔔 My Notifications
        </h2>
    </x-slot>

    <div class="notifications-container">
        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('notifications.clear') }}" class="text-center mb-6">
            @csrf
            <button type="submit" class="btn-clear">🧹 Clear All</button>
        </form>

        @forelse ($notifications as $notification)
            <div class="notif-card">
                <div class="notif-header">
                    <h3>{{ $notification->data['title'] }}</h3>
                    <p class="notif-date">📅 {{ $notification->data['booking_date'] }}</p>
                </div>
                <p class="notif-notes">📝 {{ $notification->data['notes'] }}</p>

                <div class="notif-actions">
                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                        @csrf
                        <button class="btn-action">✔ Mark as Read</button>
                    </form>

                    <form method="POST" action="{{ route('notifications.delete', $notification->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action btn-delete">🗑 Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="no-notif">📭 You have no notifications.</p>
        @endforelse
    </div>

    <style>
        body {
            background: radial-gradient(circle at top left, #1e1e2f, #0f0f1f);
            font-family: 'Inter', sans-serif;
            color: #e0eaff;
        }

        .glowing-title {
            color: #c0faff;
            text-shadow: 0 0 6px #00ffff, 0 0 12px #00e5ff;
            text-align: center;
            margin: 2rem 0;
        }

        .notifications-container {
            max-width: 900px;
            margin: auto;
            padding: 2rem;
        }

        .success-alert {
            background: #10b981;
            color: white;
            padding: 1rem;
            border-radius: 0.75rem;
            text-align: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.6);
        }

        .btn-clear {
            background: linear-gradient(90deg, #6366f1, #7c3aed);
            color: white;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 0.6rem;
            border: none;
            box-shadow: 0 0 12px rgba(124, 58, 237, 0.4);
            transition: 0.3s ease;
        }

        .btn-clear:hover {
            background: linear-gradient(90deg, #7c3aed, #6366f1);
            box-shadow: 0 0 16px rgba(124, 58, 237, 0.8);
            transform: scale(1.05);
        }

        .notif-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(12px);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.05);
            transition: transform 0.3s ease;
        }

        .notif-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 25px rgba(0, 255, 255, 0.1);
        }

        .notif-header h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.3rem;
        }

        .notif-date {
            color: #93c5fd;
            font-size: 0.9rem;
        }

        .notif-notes {
            color: #cbd5e1;
            font-size: 1rem;
            margin: 0.7rem 0 1.3rem;
        }

        .notif-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-action {
            background-color: rgba(255, 255, 255, 0.05);
            color: #38bdf8;
            padding: 0.5rem 1.2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        .btn-action:hover {
            border-color: #38bdf8;
            background-color: rgba(56, 189, 248, 0.1);
        }

        .btn-delete {
            color: #f87171;
        }

        .btn-delete:hover {
            border-color: #f87171;
            background-color: rgba(248, 113, 113, 0.1);
        }

        .no-notif {
            color: #94a3b8;
            text-align: center;
            margin-top: 3rem;
            font-size: 1.2rem;
        }
    </style>
</x-app-layout>
