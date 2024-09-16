<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Retailers List</title>
</head>
<body>
    <h1>Retailers List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Retailer Name</th>
                <th>Phone</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($retailers as $retailer)
                <tr>
                    <td>{{ $retailer->r_name }}</td>
                    <td>{{ $retailer->phone }}</td>
                    <td>{{ $retailer->region }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('retailers.create') }}">Add New Retailer</a>
</body>
</html>
