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
                            html: '{{ session('success') }}',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @elseif (session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: '{{ session('error') }}',
                            timer: 2500,
                            showConfirmButton: false
                        });
                    </script>
                @elseif ($errors->any())
                    <script>
                        @php
                            $errorsList = $errors->all();
                            $messageError = collect($errorsList)
                                ->map(function ($msg, $index) use ($errorsList) {
                                    return count($errorsList) > 1 ? $index + 1 . '. ' . e($msg) : e($msg);
                                })
                                ->implode('<br>');
                        @endphp
                        Swal.fire({
                            icon: "error",
                            title: "Ooopss!",
                            html: @json($messageError) // pakai html, bukan text
                        }).then(() => {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, '', window.location.href);
                            }
                        });
                    </script>
                @endif

            </form>
        </div>
    </body>

</html>
