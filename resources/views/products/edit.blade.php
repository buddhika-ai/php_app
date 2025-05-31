<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $product->description }}</textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
        </div>

        <div>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ $product->stock_quantity }}" required>
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            @if ($product->image)
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="100">
            @endif
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>