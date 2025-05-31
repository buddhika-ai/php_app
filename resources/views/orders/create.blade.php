<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>
    <h1>Create New Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                @foreach (\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="order_date">Order Date:</label>
            <input type="datetime-local" name="order_date" id="order_date" required>
        </div>

        <div>
            <label for="total_amount">Total Amount:</label>
            <input type="number" name="total_amount" id="total_amount" step="0.01" required>
        </div>

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="COD">COD</option>
                <option value="credit">Credit</option>
            </select>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <div>
            <label for="delivery_address">Delivery Address:</label>
            <textarea name="delivery_address" id="delivery_address"></textarea>
        </div>

        <button type="submit">Create</button>
    </form>
</body>
</html>