<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
</head>

<body>
    <h1>Create New Transaction</h1>
    
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <label for="account_id">Select Account:</label><br>
        <select id="account_id" name="account_id">
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->accountType }}</option>
            @endforeach
        </select><br>

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount"><br>

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


        <input type="submit" value="Submit">
    </form>
</body>

</html>
