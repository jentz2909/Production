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
    <div class="container">
        <div class="back-button-container">
            <h1>Add New Product</h1>
            <a href="{{ route('product.index') }}" class="back-button">Back</a>
        </div>

        <div class="form-container">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf <!-- CSRF Protection -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name" required>

                <label for="price">Price (RM):</label>
                <input type="number" id="price" name="price" step="0.01" placeholder="99.90" required>

                <label for="details">Details:</label>
                <textarea id="details" name="details" rows="4" placeholder="Detail" required></textarea>

                <label>Publish:</label><br>
                <input type="radio" id="publish_yes" name="publish" checked value="1" required>
                <label for="publish_yes">Yes</label><br>
                <input type="radio" id="publish_no" name="publish" value="0" required>
                <label for="publish_no">No</label><br>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
