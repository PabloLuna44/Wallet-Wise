<!-- resources/views/loans/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Details</title>
</head>
<body>
    <h1>Loan Details</h1>

    <p><strong>Amount:</strong> {{ $loan->amount }}</p>
    <p><strong>Interest Rate:</strong> {{ $loan->interestRate }}</p>
    <p><strong>Status:</strong> {{ $loan->status }}</p>
    <p><strong>Payment Date:</strong> {{ $loan->paymentDate }}</p>

    <a href="{{ route('loans.index') }}">Back to List</a>
</body>
</html>
