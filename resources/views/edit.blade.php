<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Add New Product</title>
</head>

<body>
    <div class='container'>
        <div class="back-button-container">
            <h1>Edit Product</h1>
            <a href="{{ route('product.index')}}" class="back-button">Back</a>
        </div>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name field -->
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required><br><br>

            <!-- Price field -->
            <label for="price">Price (RM):</label><br>
            <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01"
                required><br><br>

            <!-- Details field -->
            <label for="details">Details:</label><br>
            <textarea id="details" name="details" rows="4" required>{{ $product->details }}</textarea><br><br>

            <!-- Publish field -->
            <label>Publish:</label><br>
            <input type="radio" id="publish_yes" name="publish" value="1"
                {{ $product->publish == 1 ? 'checked' : '' }} required>
            <label for="publish_yes">Yes</label><br>
            <input type="radio" id="publish_no" name="publish" value="0"
                {{ $product->publish == 0 ? 'checked' : '' }} required>
            <label for="publish_no">No</label><br><br>

            <!-- Submit button -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>

</html>
