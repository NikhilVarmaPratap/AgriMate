<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Products List</title>
</head>
<body>
    <h1>Products List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Farmer Name</th>
                <th>Product</th>
                <th>Market Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prods as $prod)
                <tr>
                    <td>{{ $prod->farmer->name }}</td>
                    <td>{{ $prod->product }}</td>
                    <td>{{ $prod->market_val }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('prods.create') }}">Add New Product</a>
</body>
</html>
