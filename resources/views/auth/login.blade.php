<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to top right, #0f0c29, #302b63, #24243e);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    .login-container {
      backdrop-filter: blur(20px);
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      padding: 40px 30px;
      border-radius: 20px;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
    }

    .login-container h2 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 10px;
      text-align: center;
    }

    .login-container p.description {
      color: #c0c0c0;
      font-size: 0.9rem;
      text-align: center;
      margin-bottom: 25px;
    }

    label {
      font-size: 0.9rem;
      margin-bottom: 6px;
      display: block;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 16px;
      margin-bottom: 16px;
      border-radius: 10px;
      border: none;
      background-color: #1e1e2f;
      color: #fff;
      font-size: 0.95rem;
      transition: 0.3s;
      outline: 2px solid transparent;
    }

    input:focus {
      outline: 2px solid #6366f1;
      background-color: #2a2a3e;
    }

    .checkbox-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.85rem;
      margin-bottom: 25px;
    }

    .checkbox-container label {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .checkbox-container a {
      color: #7dd3fc;
      text-decoration: none;
    }

    .checkbox-container a:hover {
      text-decoration: underline;
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #6366f1, #7c3aed);
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 10px rgba(124, 58, 237, 0.4);
    }

    .submit-btn:hover {
      filter: brightness(1.1);
      box-shadow: 0 0 20px rgba(124, 58, 237, 0.6);
      transform: scale(1.01);
    }

    .footer-text {
      text-align: center;
      margin-top: 20px;
      font-size: 0.85rem;
      color: #b3b3b3;
    }

    .footer-text a {
      color: #60a5fa;
      text-decoration: none;
      font-weight: 600;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    .session-status, .error-message {
      text-align: center;
      font-size: 0.85rem;
      margin-bottom: 14px;
    }

    .session-status {
      color: #22d3ee;
    }

    .error-message {
      color: #f87171;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Welcome Back</h2>
    <p class="description">Enter your credentials to access the dashboard</p>

    <!-- Session Status -->
    @if (session('status'))
      <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder=>
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required placeholder=>
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <div class="checkbox-container">
        <label><input type="checkbox" name="remember"> Remember me</label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot password?</a>
        @endif
      </div>

      <button type="submit" class="submit-btn">Log In</button>
    </form>

    <p class="footer-text">
      Don’t have an account?
      <a href="{{ route('register') }}">Create one</a>
    </p>
  </div>

</body>
</html>
