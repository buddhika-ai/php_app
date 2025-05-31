<!DOCTYPE html>
<html>
<head>
    <title>Create Credit Purchase</title>
</head>
<body>
    <h1>Create New Credit Purchase</h1>

    <form action="{{ route('credit-purchases.store') }}" method="POST">
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
            <label for="order_id">Order:</label>
            <select name="order_id" id="order_id" required>
                @foreach (\App\Models\Order::all() as $order)
                    <option value="{{ $order->id }}">Order #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" required>
        </div>

        <div>
            <label for="deduction_date">Deduction Date:</label>
            <input type="date" name="deduction_date" id="deduction_date" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pending">Pending</option>
                <option value="deducted">Deducted</option>
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
</body>
</html>