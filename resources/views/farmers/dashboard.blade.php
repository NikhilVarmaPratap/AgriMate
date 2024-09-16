<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <ul>
        <li><a href="{{ route('sell.create') }}">Want to Sell</a></li>
        <li><a href="{{ route('storage.nearby') }}">Want to Store</a></li>
    </ul>

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>
