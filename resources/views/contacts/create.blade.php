<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Add Contact</title>
</head>
<body>
    <h1>Add New Contact</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <label for="num">Phone Number:</label>
        <input type="text" id="num" name="num" required>
        <br>
        <button type="submit">Add Contact</button>
    </form>

    <a href="{{ route('contacts.index') }}">Back to Contacts List</a>
</body>
</html>
