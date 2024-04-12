<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="create-container d-flex justify-content-between align-items-center">
            <h1 class="heading">Laravel</h1>
            <a href="{{ route('product.create') }}" class="btn btn-success create-button">Create New Product</a>
        </div>

        <form action="{{ route('product.search') }}" method="GET" class="search-form">
            <div class="search-container">
                <input type="text" name="query" id="search-input" placeholder="Search...">
                <button type="submit" id="search-button">Search</button>
            </div>
        </form>

        <!-- Display success or error messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Display a styled table of products using Bootstrap -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="width: 100px">No</th>
                        <th scope="col" style="width: 100px">Name</th>
                        <th scope="col" style="width: 100px">Price(RM)</th>
                        <th scope="col" style="width: 300px">Details</th>
                        <th scope="col" style="width: 150px">Publish</th>
                        <th scope="col" style="width: 300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $index => $products)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $products->name }}</td>
                            <td>{{ $products->price }}</td>

                            <!-- Limit the text no more than 30 -->
                            <td>{{ \Illuminate\Support\Str::limit($products->details, 30) }}</td>
                            <td>{{ $products->publish == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                <!-- Show button -->
                                <a href="{{ route('product.show', $products->id) }}"
                                    class="btn btn-primary btn-action">Show</a>

                                <!-- Edit button -->
                                <a href="{{ route('product.edit', $products->id) }}"
                                    class="btn btn-success btn-action">Edit</a>

                                <!-- Delete button -->
                                <form action="{{ route('product.destroy', $products->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-action"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
