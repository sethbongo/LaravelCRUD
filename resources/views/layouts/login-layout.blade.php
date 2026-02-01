<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-link/>
    <title>@yield('title', '')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login-layout.css') }}">

    {{-- @vite(['resources/css/app.css', 'resources/css/login-layout.css']) --}}
</head>

<body>

    <div name="forms" id="forms">
        @yield('content')
    </div>
</body>
</html>