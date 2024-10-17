<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- lenks -->
</head>
<body>
    <header>
        <a href="{{ route('student.index') }}">Students</a>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
    </footer>
</body>
    <!-- screps -->
</html>