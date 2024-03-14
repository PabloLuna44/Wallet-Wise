<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Transactions</title>
</head>
<body>
    <h2>Account Transactions</h2>

    <div>
        <a href="{{ route('transactions.create') }}">Crear Nueva Transacción</a>
    </div>

    @foreach ($accounts as $account)
        <div>
            <h3>Account Type: {{ $account->accountType }}</h3>
            <p>Balance: {{ $account->balance }}</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($account->transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->transactionType }}</td>
                            <td>{{ $transaction->dateTime }}</td>
                            <td>
                                <a href="{{ route('transactions.show', $transaction->id) }}">Ver</a>
                                <a href="{{ route('transactions.edit', $transaction->id) }}">Editar</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
