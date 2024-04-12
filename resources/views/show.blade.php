<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Show Product</title>
</head>
<body>
    <div class="container">
        <div class="back-button-container">
            <h1 class="title">Show Product</h1>
            <a href="{{ route('product.index') }}" class="back-button">Back</a>
        </div>
        <div class="product-details">
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Price: </strong> RM {{ $product->price }}</p>
            <p><strong>Details:</strong> {{ $product->details }}</p>
            <p><strong>Publish:</strong> {{ $product->publish == 1 ? 'Yes' : 'No' }}</p>
        </div>
    </div>
</body>
</html>
