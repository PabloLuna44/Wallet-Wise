<!-- resources/views/transactions/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
</head>
<body>
    <h1>Edit Transaction</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT')

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}"><br>

        <label for="transactionType">Transaction Type:</label><br>
        <select id="transactionType" name="transactionType">
            <option value="Depósito" {{ $transaction->transactionType == 'Depósito' ? 'selected' : '' }}>Depósito</option>
            <option value="Retiro" {{ $transaction->transactionType == 'Retiro' ? 'selected' : '' }}>Retiro</option>
            <option value="Transferencia" {{ $transaction->transactionType == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
            <option value="Pago" {{ $transaction->transactionType == 'Pago' ? 'selected' : '' }}>Pago</option>
        </select><br>

          <label for="accounts_id">Account</label><br>
        <select id="accounts_id" name="accounts_id">
            @foreach($accounts as $account)
            <option value="{{$account->id}}">{{$account->accountType}}</option>
            @endforeach
        </select><br>


        <label for="dateTime">Date Time:</label><br>
        <input type="datetime-local" id="dateTime" name="dateTime" value="{{ old('dateTime', date('Y-m-d\TH:i', strtotime($transaction->dateTime))) }}"><br>

        <button type="submit">Update Transaction</button>
    </form>
</body>
</html>
