<!DOCTYPE html>
<html>
<head>
    <title>Credit Purchase Details</title>
</head>
<body>
    <h1>Credit Purchase Details</h1>

    <div>
        <strong>User:</strong>
        {{ $creditPurchase->user->name }}
    </div>

    <div>
        <strong>Order:</strong>
        {{ $creditPurchase->order->id }}
    </div>

    <div>
        <strong>Amount:</strong>
        {{ $creditPurchase->amount }}
    </div>

    <div>
        <strong>Deduction Date:</strong>
        {{ $creditPurchase->deduction_date }}
    </div>

    <div>
        <strong>Status:</strong>
        {{ $creditPurchase->status }}
    </div>

    <a href="{{ route('credit-purchases.index') }}">Back to Credit Purchases</a>
</body>
</html>