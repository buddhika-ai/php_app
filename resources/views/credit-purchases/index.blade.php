<!DOCTYPE html>
<html>
<head>
    <title>Credit Purchases</title>
</head>
<body>
    <h1>Credit Purchases</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('credit-purchases.create') }}">Create New Credit Purchase</a>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Order</th>
                <th>Amount</th>
                <th>Deduction Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditPurchases as $creditPurchase)
                <tr>
                    <td>{{ $creditPurchase->user->name }}</td>
                    <td>{{ $creditPurchase->order->id }}</td>
                    <td>{{ $creditPurchase->amount }}</td>
                    <td>{{ $creditPurchase->deduction_date }}</td>
                    <td>{{ $creditPurchase->status }}</td>
                    <td>
                        <a href="{{ route('credit-purchases.show', $creditPurchase->id) }}">View</a>
                        <a href="{{ route('credit-purchases.edit', $creditPurchase->id) }}">Edit</a>
                        <form action="{{ route('credit-purchases.destroy', $creditPurchase->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>