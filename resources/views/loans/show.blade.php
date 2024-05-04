<!-- resources/views/loans/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Loan</title>
</head>
<body>
    <h1>Show Loan</h1>

    <p><strong>Amount:</strong> {{ $loan->amount }}</p>
    <p><strong>Interest Rate:</strong> {{ $loan->interestRate }}</p>
    <p><strong>Status:</strong> {{ $loan->status }}</p>
    <p><strong>Payment Date:</strong> {{ $loan->paymentDate }}</p>

    <h2>Associated Users</h2>
    <ul>
        @foreach($loan->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('loans.index') }}">Back to Loans</a>
</body>
</html>
