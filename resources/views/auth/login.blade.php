<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAP | Login</title>
    <link rel="stylesheet" href="{{ asset('assets-frontend/css/login-style.css') }}">
</head>

<body>
    <div class="wrapper">
        <form class="login" method="POST" action="{{ route('login') }}">
            @csrf
            @method('POST')
            <h2>SIKAP | Login</h2>
            <div class="input-field">
                <input type="email" name="email" required>
                <label>Enter your email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
            </div>
            <button type="submit">Log In</button>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif
        </form>
    </div>
</body>

</html>
