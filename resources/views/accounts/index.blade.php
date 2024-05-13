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

            <!-- Botón para editar la cuenta -->
            <a class="btn btn-primary m-2" href="{{ route('accounts.edit', $account->id) }}">Editar</a>

            <!-- Formulario para eliminar la cuenta -->
            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-2">Eliminar</button>
            </form>

            <!-- Enlace para ver las transacciones de la cuenta -->
            <a href="{{ route('transactions.index', ['account_id' => $account->id]) }}">View Transactions</a>
        </div>
    @endforeach

</x-layout>
