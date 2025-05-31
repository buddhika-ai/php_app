<!DOCTYPE html>
<html>
<head>
    <title>Edit Credit Purchase</title>
</head>
<body>
    <h1>Edit Credit Purchase</h1>

    <form action="{{ route('credit-purchases.update', $creditPurchase->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                @foreach (\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" {{ $creditPurchase->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="order_id">Order:</label>
            <select name="order_id" id="order_id" required>
                @foreach (\App\Models\Order::all() as $order)
                    <option value="{{ $order->id }}" {{ $creditPurchase->order_id == $order->id ? 'selected' : '' }}>Order #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" value="{{ $creditPurchase->amount }}" required>
        </div>

        <div>
            <label for="deduction_date">Deduction Date:</label>
            <input type="date" name="deduction_date" id="deduction_date" value="{{ $creditPurchase->deduction_date }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pending" {{ $creditPurchase->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="deducted" {{ $creditPurchase->status == 'deducted' ? 'selected' : '' }}>Deducted</option>
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>