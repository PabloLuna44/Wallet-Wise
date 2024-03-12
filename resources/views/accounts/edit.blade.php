<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h1>Edit Account</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="accountType">Account Type:</label><br>
        <input type="text" id="accountType" name="accountType" value="{{ old('accountType', $account->accountType) }}"><br>

        <label for="balance">Balance:</label><br>
        <input type="text" id="balance" name="balance" value="{{ old('balance', $account->balance) }}"><br>

        <button type="submit">Update Account</button>
    </form>
</body>
</html>
