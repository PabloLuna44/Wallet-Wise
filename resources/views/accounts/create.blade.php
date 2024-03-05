<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
</head>
<body>
    <h1>Create New Account</h1>
    
    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <label for="accountType">Account Type:</label><br>
        <input type="text" id="accountType" name="accountType"><br>

        <label for="balance">Balance:</label><br>
        <input type="text" id="balance" name="balance"><br>

        <button type="submit">Create Account</button>
    </form>
</body>
</html>
