<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <div class="container justify-content-between d-flex align-items-end">
            <h1 class="text-light">App Name</h1>
            <div class="d-flex gap-3">
                {{-- for client --}}
                <a href="/" class="text-light h5">Home</a>
                <a href="/about" class="text-light h5">About</a>
                @guest
                    <a href="/login" class="text-light h5">Login</a>
                @endguest
                {{-- for admin --}}
                @auth
                    <a href="/dashboard" class="text-light h5">Dashboard</a>
                    <a href="/users" class="text-light h5">Users</a>
                    <a href="/cars" class="text-light h5">Cars</a>
                    <a href="/logout" class="text-light h5">Logout</a>
                @endauth
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
    @endif

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
