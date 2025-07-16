<x-guest-layout>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            background: rgba(30, 30, 47, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2.5rem 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 0;
        }

        form::before {
            content: "";
            position: absolute;
            inset: -2px;
            background:
            background-size: 400% 400%;
            border-radius: inherit;
            z-index: -2;
            animation: glow-border 8s linear infinite;
        }

        form::after {
            content: "";
            position: absolute;
            inset: 0;
            background: #1e1e2f;
            border-radius: inherit;
            z-index: -1;
        }

        @keyframes glow-border {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: #eee;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.25rem;
            background-color: #2c2c3a;
            color: #fff;
            border: 1px solid #555;
            border-radius: 0.6rem;
            font-size: 1rem;
            transition: 0.3s;
        }

        input:focus {
            border-color: #fff;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
            outline: none;
            background-color: #383851;
        }

        .error {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: -0.9rem;
            margin-bottom: 1rem;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .form-footer a {
            font-size: 0.9rem;
            color: #bbb;
            text-decoration: none;
        }

        .form-footer a:hover {
            color: #fff;
            text-decoration: underline;
        }

        button {
            background: linear-gradient(90deg green,);
            background-size: 400%;
            color: white;
            padding: 0.7rem 1.4rem;
            border: none;
            border-radius: 0.6rem;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.3);
            animation: rainbowBtn 6s ease infinite;
            transition: transform 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);
        }

        @keyframes rainbowBtn {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @media (max-width: 500px) {
            form {
                padding: 2rem 1.5rem;
            }
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2 style="text-align:center; font-size:1.7rem; margin-bottom:1.5rem; font-weight:bold;">Create Account</h2>

        <!-- Name -->
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-footer">
            <a href="{{ route('login') }}">Already registered?</a>
            <button type="submit">Register</button>
        </div>
    </form>
</x-guest-layout>
