<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Prediction</title>
</head>
<body>
    <h1>Predict Product Price</h1>

    @if(session('predictedPrice'))
        <p style="color: green;">Predicted Price: ${{ session('predictedPrice') }}</p>
    @endif

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('predict.price') }}" method="POST">
        @csrf
        <label for="market_factor1">Market Factor 1:</label>
        <input type="number" step="0.01" id="market_factor1" name="market_factor1" required>
        <br>
        <label for="market_factor2">Market Factor 2:</label>
        <input type="number" step="0.01" id="market_factor2" name="market_factor2" required>
        <br>
        <button type="submit">Get Predicted Price</button>
    </form>
</body>
</html>
