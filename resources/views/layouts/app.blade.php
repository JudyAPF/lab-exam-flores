<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Manager') | SITE</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="navbar">
        <a href="{{ route('students.index') }}" class="brand">SITE <span>Student Manager</span></a>

        {{-- Task 5 adds the logged-in user's name and a Log out button here --}}
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        School of Information Technology Education &middot; Universidad de Dagupan
    </footer>
</body>
</html>
