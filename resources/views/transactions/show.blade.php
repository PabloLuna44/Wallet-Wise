<!-- resources/views/transactions/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
</head>
<body>
    <h1>Transaction Details</h1>

    <p>Amount: {{ $transaction->amount }}</p>
    <p>Transaction Type: {{ $transaction->transactionType }}</p>
    <p>Date Time: {{ $transaction->dateTime }}</p>
</body>
</html>
