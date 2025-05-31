<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

    <div>
        <strong>User:</strong>
        {{ $order->user->name }}
    </div>

    <div>
        <strong>Order Date:</strong>
        {{ $order->order_date }}
    </div>

    <div>
        <strong>Total Amount:</strong>
        {{ $order->total_amount }}
    </div>

    <div>
        <strong>Payment Method:</strong>
        {{ $order->payment_method }}
    </div>

    <div>
        <strong>Status:</strong>
        {{ $order->status }}
    </div>

    <div>
        <strong>Delivery Address:</strong>
        {{ $order->delivery_address }}
    </div>

    <a href="{{ route('orders.index') }}">Back to Orders</a>
</body>
</html>