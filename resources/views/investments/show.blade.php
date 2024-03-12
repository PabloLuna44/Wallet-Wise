<!-- resources/views/investment/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Investment</title>
</head>
<body>
    <h1>Investment Details</h1>
    <p><strong>Type:</strong> {{ $investment->type }}</p>
    <p><strong>Amount:</strong> {{ $investment->amount }}</p>
    <p><strong>Investment Date:</strong> {{ $investment->investmentDate }}</p>
    <p><strong>Return:</strong> {{ $investment->return }}</p>
    <p><strong>Status:</strong> {{ $investment->status }}</p>
</body>
</html>
