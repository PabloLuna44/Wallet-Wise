<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>
<body>
    <h1>Accounts</h1>
    <a href="{{ route('accounts.create') }}">Create New Account</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Actions</th>
        </tr>
        @foreach($accounts as $account)
        <tr>
            <td>{{ $account->id }}</td>
            <td>{{ $account->accountType }}</td>
            <td>{{ $account->balance }}</td>
            <td>
                <a href="{{ route('accounts.show', $account->id) }}">View</a>
                <a href="{{ route('accounts.edit', $account->id) }}">Edit</a>
                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
