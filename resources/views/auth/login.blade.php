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

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: '{{ session('success') }}',
                        timer: 2000,
                        showConfirmButton: false
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>
            @endif

        </form>
    </div>
</body>

</html>
