<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Add Retailer</title>
</head>
<body>
    <h1>Add New Retailer</h1>

    <form action="{{ route('retailers.store') }}" method="POST">
        @csrf
        <label for="r_name">Retailer Name:</label>
        <input type="text" id="r_name" name="r_name" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <label for="region">Region:</label>
        <input type="text" id="region" name="region" required>
        <br>
        <button type="submit">Add Retailer</button>
    </form>

    <a href="{{ route('retailers.index') }}">Back to Retailers List</a>
</body>
</html>
