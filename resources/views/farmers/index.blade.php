<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Farmers List</title>
</head>
<body>
    <h1>Farmers List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($farmers as $farmer)
                <tr>
                    <td>{{ $farmer->name }}</td>
                    <td>{{ $farmer->email }}</td>
                    <td>{{ $farmer->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('farmers.create') }}">Add New Farmer</a>
</body>
</html>
