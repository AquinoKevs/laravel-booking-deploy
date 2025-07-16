<x-app-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e2e8f0;
        }

        .dashboard-container {
            min-height: 100vh;
            padding: 4rem 1.5rem;
            max-width: 1200px;
            margin: auto;
        }

        .dashboard-header h1 {
            font-size: 2.7rem;
            font-weight: 800;
            margin-bottom: 0.3rem;
            color: #f8fafc;
            text-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
        }

        .dashboard-header p {
            color: #94a3b8;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .card {
            background: rgba(51, 65, 85, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.2rem;
            padding: 2rem;
            box-shadow: 0 0 18px rgba(0, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 25px rgba(94, 234, 212, 0.4);
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 0.6rem;
            color: #f1f5f9;
        }

        .card p {
            font-size: 1rem;
            color: #cbd5e1;
        }

        /* Sidebar Toggle Button */
        .drawer-toggle {
            position: fixed;
            top: 1.2rem;
            left: 1.2rem;
            background: linear-gradient(145deg, #3b82f6, #6366f1);
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 0.75rem;
            cursor: pointer;
            font-size: 1.5rem;
            z-index: 101;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.6);
            transition: background 0.3s ease;
        }

        .drawer-toggle:hover {
            background: #2563eb;
        }

        /* Sidebar */
        .drawer {
            position: fixed;
            top: 0;
            left: -260px;
            width: 220px;
            height: 100%;
            background: rgba(15, 23, 42, 0.95);
            border-right: 1px solid #3b82f6;
            backdrop-filter: blur(10px);
            transition: left 0.3s ease;
            z-index: 100;
            padding: 2rem 1rem;
        }

        .drawer.open {
            left: 0;
        }

        .drawer-links {
            margin-top: 3rem;
            display: flex;
            flex-direction: column;
        }

        .drawer a {
            margin-bottom: 1rem;
            color: #e0f2fe;
            background: linear-gradient(to right, #3b82f6, #6366f1);
            padding: 0.65rem 1rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .drawer a:hover {
            background: linear-gradient(to right, #2563eb, #4f46e5);
            transform: scale(1.03);
        }

        @media (max-width: 640px) {
            .drawer-toggle {
                font-size: 1.25rem;
                padding: 0.5rem 0.8rem;
            }

            .dashboard-header h1 {
                font-size: 2rem;
            }
        }
    </style>

    <!-- Toggle Button -->
    <div class="drawer-toggle" onclick="document.querySelector('.drawer').classList.toggle('open')">☰</div>

    <!-- Sidebar Navigation -->
    <div class="drawer">
        <div class="drawer-links">
            <a href="{{ url('/bookings/create') }}">➕ Create Booking</a>
            <a href="{{ url('/bookings') }}">📖 View Bookings</a>
            <a href="{{ url('/profile') }}">👥 User Management</a>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>📋 Booking Dashboard</h1>
            <p>Welcome back! Here's a quick overview of your platform.</p>
        </header>

        <section class="card-grid">
            <div class="card">
                <h2>📊 Total Bookings</h2>
                <p>You currently have <strong>{{ $totalBookings }}</strong> booking{{ $totalBookings !== 1 ? 's' : '' }}.</p>
            </div>

            <div class="card">
                <h2>👥 Total Users</h2>
                <p>There {{ $totalUsers === 1 ? 'is' : 'are' }} <strong>{{ $totalUsers }}</strong> registered user{{ $totalUsers !== 1 ? 's' : '' }}.</p>
            </div>
        </section>
    </div>

    <!-- Click Outside to Close Drawer -->
    <script>
        window.addEventListener('click', function (e) {
            const drawer = document.querySelector('.drawer');
            const toggle = document.querySelector('.drawer-toggle');
            if (!drawer.contains(e.target) && !toggle.contains(e.target)) {
                drawer.classList.remove('open');
            }
        });
    </script>
</x-app-layout>
