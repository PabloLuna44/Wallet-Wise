<!-- resources/views/transactions/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
</head>

<body>
    <h1>Create New Transaction</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ old('amount') }}"><br>

        <label for="transactionType">Transaction Type:</label><br>
        <select id="transactionType" name="transactionType">
            <option value="Depósito">Depósito</option>
            <option value="Retiro">Retiro</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Pago">Pago</option>
        </select><br>



        <label for="accounts_id">Account</label><br>
        <select id="accounts_id" name="accounts_id">
            @foreach($accounts as $account)
            <option value="{{$account->id}}">{{$account->accountType}}</option>
            @endforeach
        </select><br>

        <label for="dateTime">Date Time:</label><br>
        <input type="datetime-local" id="dateTime" name="dateTime" value="{{ old('dateTime') }}"><br>

        <button type="submit">Create Transaction</button>
    </form>
</body>

</html>
