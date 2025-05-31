<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                @foreach (\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="order_date">Order Date:</label>
            <input type="datetime-local" name="order_date" id="order_date" value="{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div>
            <label for="total_amount">Total Amount:</label>
            <input type="number" name="total_amount" id="total_amount" step="0.01" value="{{ $order->total_amount }}" required>
        </div>

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="COD" {{ $order->payment_method == 'COD' ? 'selected' : '' }}>COD</option>
                <option value="credit" {{ $order->payment_method == 'credit' ? 'selected' : '' }}>Credit</option>
            </select>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div>
            <label for="delivery_address">Delivery Address:</label>
            <textarea name="delivery_address" id="delivery_address">{{ $order->delivery_address }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>