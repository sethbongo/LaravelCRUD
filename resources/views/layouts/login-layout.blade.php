<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-layout/>

    <title>@yield('title', '')</title>

<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
}

#forms {
    background-color: white !important;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    padding: 40px;
    max-width: 400px;
}

#forms input[type="text"],
#forms input[type="email"],
#forms input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #000000;
    border-radius: 5px;
    font-size: 14px;
}

#forms button {
    width: 100%;
    padding: 12px;
    color: rgb(0, 0, 0);
    border: 1px black solid;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    background-color: white
}

#forms button:hover {
            background-color: #bebaba;
}
    
</style>
</head>

<body>

    <div name="forms" id="forms">
        @yield('content')
    </div>
</body>
</html>