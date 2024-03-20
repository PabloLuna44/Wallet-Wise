
<x-layout :title="$title">
<body>
    <h1>Create New Transaction</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


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


        <label for="dateTime">Date Time:</label><br>
        <input type="datetime-local" id="dateTime" name="dateTime" value="{{ old('dateTime') }}"><br>


        <input type="submit" value="Submit">
    </form>
</body>


</x-layout>

