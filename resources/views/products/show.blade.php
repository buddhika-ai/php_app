<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>

    <div>
        <strong>Name:</strong>
        {{ $product->name }}
    </div>

    <div>
        <strong>Description:</strong>
        {{ $product->description }}
    </div>

    <div>
        <strong>Price:</strong>
        {{ $product->price }}
    </div>

    <div>
        <strong>Stock Quantity:</strong>
        {{ $product->stock_quantity }}
    </div>

    <div>
        <strong>Image:</strong>
        @if ($product->image)
            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="200">
        @else
            No image available
        @endif
    </div>

    <a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>