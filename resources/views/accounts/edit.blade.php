<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h1>Edit Account</h1>
    
    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="accountType">Account Type:</label><br>
        <input type="text" id="accountType" name="accountType" value="{{ $account->accountType }}"><br>

        <label for="balance">Balance:</label><br>
        <input type="text" id="balance" name="balance" value="{{ $account->balance }}"><br>

        <button type="submit">Update Account</button>
    </form>
</body>
</html>
