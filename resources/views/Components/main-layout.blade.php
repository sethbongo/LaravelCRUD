<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <x-layout/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        nav {
            background-color: #000000;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        nav ul li a:hover {
            background-color: #333;
        }
        
        .nav-left {
            display: flex;
        }
        
        .nav-right {
            display: flex;
        }
        
        .logout-form {
            margin: 0;
        }
        
        .logout-btn {
            background-color: #000000;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
        }
        
        .logout-btn:hover {
            background-color: #333;
        }

        
    </style>

        @stack('styles') 

</head>
<body>
<nav>
    <ul class="nav-left">
        <li><a href="{{ route('welcome') }}">ToDo</a></li>
        <li><a href="">Profile</a></li>
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

{{ $content ?? "" }}
    
</body>    
</html>
