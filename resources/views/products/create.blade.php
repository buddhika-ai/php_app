<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>

        <div>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" name="stock_quantity" id="stock_quantity" required>
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit">Create</button>
    </form>
</body>
</html>