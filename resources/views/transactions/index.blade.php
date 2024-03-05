<!-- resources/views/transactions/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body>
    <h1>Transactions</h1>

    <a href="{{ route('transactions.create') }}">Create New Transaction</a>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Transaction Type</th>
            <th>Date Time</th>
            <th>Actions</th>
        </tr>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->transactionType }}</td>
            <td>{{ $transaction->dateTime }}</td>
            <td>
                <a href="{{ route('transactions.show', $transaction->id) }}">View</a>
                <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
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
