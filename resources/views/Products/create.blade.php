<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <form action="{{ route('prods.store') }}" method="POST">
        @csrf
        <label for="f_id">Farmer:</label>
        <select name="f_id" id="f_id" required>
            <option value="">Select Farmer</option>
            @foreach ($farmers as $farmer)
                <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required>
        <br>
        <label for="market_val">Market Value:</label>
        <input type="number" id="market_val" name="market_val" required>
        <br>
        <button type="submit">Add Product</button>
    </form>

    <a href="{{ route('prods.index') }}">Back to Products List</a>
</body>
</html>
