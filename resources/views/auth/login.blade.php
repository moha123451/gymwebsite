<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gym</title>
    <style>
        body {
            background-color: #f7f7f7;
            color: #333;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            margin: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-size: cover;
            background-position: center;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #f27c3e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* تنسيق المدخلات */
        .form-group label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 70%;
            padding: 12px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f4f4f4;
            color: #333;
            margin-top: 8px;
            display: block
        }

        .form-group input:focus {
            outline: none;
            border-color: #f27c3e;
        }

        /* الأزرار */
        button {
            padding: 12px 16px;
            background-color: #f27c3e;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            width: 70%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e26a2a;
        }

        /* تنسيق روابط "نسيت كلمة المرور" */
        .btn-link {
            text-align: center;
            margin-top: 15px;
            display: block;
            font-size: 14px;
            color: #f27c3e;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        /* تنسيق التنبيهات */
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }

        /* تنسيق الـ checkbox مع النص */

        .remeber {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Gym Login</h2>
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remeber">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="form-check-label">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-custom">Login</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn-link">Forgot Your Password?</a>
                @endif
            </form>
        </div>

        <div class="footer-text">
            <p>&copy; 2025 Gym. All rights reserved.</p>
        </div>
    </div>

</body>

</html>
