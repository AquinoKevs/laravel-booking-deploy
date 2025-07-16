<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">🌟 My Glowing Bookings</h2>
    </x-slot>

    <div class="main-container">
        <div class="max-w-6xl mx-auto mt-10 px-6">
            @if (session('success'))
                <div class="alert-success animate-glow">
                    {{ session('success') }}
                </div>
            @endif

            @if ($bookings->isEmpty())
                <div class="no-bookings">
                    <p class="mb-4 text-lg">You have no bookings yet. Click below to get started!</p>
                    <a href="{{ route('bookings.create') }}"
                       class="btn-primary glow-button">+ Create Booking</a>
                </div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y g:i A') }}</td>
                                    <td>{{ $booking->notes ?? '-' }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('bookings.edit', $booking) }}" class="edit-btn">✏️ Edit</a>
                                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">🗑️ Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="new-booking">
                <a href="{{ route('bookings.create') }}" class="btn-primary glow-button">+ New Booking</a>
            </div>
        </div>
    </div>

    {{-- 🌈 Styling --}}
    <style>
        body {
            background: linear-gradient(120deg, #1a1a1a, #320e3b);
        }

        .main-container {
            background: rgba(15, 23, 42, 0.96);
            min-height: 100vh;
            padding-bottom: 4rem;
        }

        .page-header {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffd8b0;
            text-shadow: 0 0 12px rgba(255, 115, 0, 0.9);
            margin-bottom: 2rem;
            text-align: center;
            padding-top: 2rem;
        }

        .alert-success {
            background: linear-gradient(to right, #00bfff, #1e40af);
            color: white;
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(0, 191, 255, 0.7);
            font-weight: bold;
            text-align: center;
        }

        .animate-glow {
            animation: glowPulse 2s infinite;
        }

        @keyframes glowPulse {
            0%, 100% { box-shadow: 0 0 15px rgba(0, 191, 255, 0.6); }
            50% { box-shadow: 0 0 30px rgba(0, 191, 255, 0.9); }
        }

        .no-bookings {
            background: #1e293b;
            border: 1px solid #60a5fa;
            padding: 2.5rem;
            border-radius: 1rem;
            text-align: center;
            color: #dbeafe;
            font-size: 1.1rem;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }

        .table-container {
            overflow-x: auto;
            background-color: #0f172a;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
            border: 2px solid transparent;
            border-image: linear-gradient(to right, #0ea5e9, #9333ea) 1;
            padding: 1rem;
            margin-top: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #e0e0e0;
            font-size: 1rem;
            text-align: center;
        }

        thead {
            background: linear-gradient(to right, #3b82f6);
            color: white;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        th, td {
            padding: 1.25rem;
            border-top: 1px solid #334155;
        }

        tr:hover {
            background-color: #1f2937;
            box-shadow: 0 0 10px rgba(0, 191, 255, 0.15);
        }

        .action-buttons a,
        .action-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            margin: 0 0.2rem;
        }

        .edit-btn {
            background: linear-gradient(to right, #38bdf8, #6366f1);
            color: white;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.6);
        }

        .edit-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.9);
        }

        .delete-btn {
            background: linear-gradient(to right, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
        }

        .delete-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.8);
        }

        .new-booking {
            margin-top: 3rem;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(to right, #f472b6, #f87171);
            color: white;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 0.75rem;
            text-decoration: none;
            display: inline-block;
        }

        .glow-button {
            box-shadow: 0 0 15px rgba(246, 92, 92, 0.6);
            transition: all 0.3s ease;
        }

        .glow-button:hover {
            transform: scale(1.07);
            box-shadow: 0 0 30px rgba(246, 92, 92, 0.8);
        }
    </style>
</x-app-layout>
