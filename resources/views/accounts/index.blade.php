<x-layout :title="$title">
    <h2>Account Index</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('accounts.create') }}">Create A New Account</a>
    </div>
    <br>

    @foreach ($accounts as $account)
        <div>
            <h3>Account Type: {{ $account->account_type }}</h3>
            <p>Initial Balance: {{ $account->balance }}</p> <!-- Mostrar el monto inicial -->

            @php
                $depositTypes = ['Depósito', 'Transferencia'];
                $withdrawTypes = ['Retiro', 'Pago'];
                $totalDeposits = $account->transactions->whereIn('transaction_type', $depositTypes)->sum('amount');
                $totalWithdrawals = $account->transactions->whereIn('transaction_type', $withdrawTypes)->sum('amount');
                $currentBalance = $account->balance + $totalDeposits - $totalWithdrawals;
            @endphp

            <p>Current Balance: {{ $currentBalance }}</p> <!-- Mostrar el saldo actual -->
            <a href="{{ route('transactions.index', ['account_id' => $account->id]) }}">View Transactions</a> <!-- Enlace para ver las transacciones de la cuenta -->
        </div>
    @endforeach

</x-layout>
