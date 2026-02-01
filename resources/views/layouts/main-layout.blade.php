<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '')</title>
    <x-link/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-layout.css') }}">

    {{-- @vite(['resources/css/app.css', 'resources/css/main-layout.css']) --}}

    @yield('custom-css')

</head>
<body>
<nav>
    <ul class="nav-left">
        <li><a href="{{ route('welcome') }}">Tasks</a></li>
        <li><a href="{{ route('profile') }}">Profile</a></li>
    </ul>

    <ul class="nav-right">
<li>
    <form action="{{ route('logout_user') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</li>
    </ul>
</nav>

@yield('content')    
</body>    
</html>
