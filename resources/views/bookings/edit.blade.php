<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Booking
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
        }

        .form-container {
            max-width: 720px;
            margin: 2rem auto;
            padding: 2rem;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-container h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #111827;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        textarea,
        .flatpickr-input {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            background-color: #f9fafb;
            margin-bottom: 1rem;
            color: #111827;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: #fff;
        }

        .calendar-wrapper {
            margin-bottom: 1.5rem;
        }

        .submit-button {
            background-color: #3b82f6;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #2563eb;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: #3b82f6;
            text-decoration: underline;
        }

        .error-box {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .flatpickr-calendar {
            font-size: 1.1rem !important;
        }

        .flatpickr-day {
            padding: 10px !important;
            font-size: 1rem !important;
        }

        .flatpickr-day.selected {
            background-color: #2563eb !important;
            color: white !important;
        }
    </style>

    <div class="form-container">
        <h1>✏️ Edit Booking</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <label for="title">Booking Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $booking->title) }}" required>

            <!-- Booking Date -->
            <label for="booking_date">Booking Date & Time</label>
            <input type="hidden" name="booking_date" id="booking_date"
                value="{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d H:i')) }}">
            <div id="calendarBox" class="calendar-wrapper"></div>

            <!-- Notes -->
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" rows="4" placeholder="Optional notes...">{{ old('notes', $booking->notes) }}</textarea>

            <!-- Submit -->
            <button type="submit" class="submit-button">✅ Update Booking</button>
        </form>

        <a href="{{ route('bookings.index') }}" class="back-link">← Back to Bookings</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#calendarBox", {
            inline: true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            defaultDate: "{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d H:i')) }}",
            time_24hr: false,
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr) {
                document.getElementById("booking_date").value = dateStr;
            }
        });
    </script>
</x-app-layout>
