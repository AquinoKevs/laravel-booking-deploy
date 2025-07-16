<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
        }

        .center-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .form-wrapper {
            width: 100%;
            max-width: 800px;
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1d4ed8;
            text-align: center;
            margin-bottom: 2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .submit-btn {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #2563eb;
        }

        .error-box {
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        /* 🔍 Enlarged and Centered Calendar */
        #calendarBox {
            max-width: 100%;
            margin: 0 auto 1.5rem auto;
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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            📅 Create Booking
        </h2>
    </x-slot>

    <div class="center-container">
        <div class="form-wrapper">
            <h1 class="form-title">📅 Create Booking</h1>

            @if ($errors->any())
                <div class="error-box">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <!-- Booking Title -->
                <label for="title">Booking Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required
                    placeholder=""
                >

                <!-- Booking Calendar -->
                <label for="booking_date">Booking Date & Time</label>
                <input type="hidden" name="booking_date" id="booking_date">
                <div id="calendarBox"></div>

                <!-- Notes -->
                <label for="notes">Notes (Optional)</label>
                <textarea
                    name="notes"
                    id="notes"
                    rows="4"
                    placeholder="Any extra information..."
                >{{ old('notes') }}</textarea>

                <!-- Submit -->
                <button type="submit" class="submit-btn">➕ Submit Booking</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#calendarBox", {
            inline: true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            defaultDate: new Date(),
            time_24hr: false,
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr) {
                document.getElementById("booking_date").value = dateStr;
            }
        });
    </script>
</x-app-layout>
