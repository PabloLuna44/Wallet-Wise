<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
</head>
<body>
    <h1>Account Details</h1>
    
    <p>ID: {{ $account->id }}</p>
    <p>Account Type: {{ $account->accountType }}</p>
    <p>Balance: {{ $account->balance }}</p>

    <a href="{{ route('accounts.index') }}">Back to Accounts</a>
</body>
</html>
