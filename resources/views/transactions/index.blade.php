<x-layout :title="$title">
    <h2>Account Transactions</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('transactions.create') }}">Create A New Transaction</a>
        <a href="{{ route('transactions.recycle')}}" class="btn btn-primary">Recycle Bin</a>
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
            <p>Total Transactions: {{ $totalDeposits - $totalWithdrawals }}</p>
            <p>Current Balance: {{ $currentBalance }}</p> <!-- Calcula el saldo -->
            @php
                $transactionsData = [
                    ['Amount', 'Type', 'Date', 'Actions']
                ];
                foreach ($account->transactions as $transaction) {
                    $actions = '<a class="btn btn-outline-primary m-2" href="'.route('transactions.show', $transaction->id).'">Ver</a> '.
                               '<a class="btn btn-outline-primary m-2" href="'.route('transactions.edit', $transaction->id).'">Editar</a> '.
                               '<form action="'.route('transactions.destroy', $transaction->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
                    $transactionsData[] = [
                        $transaction->amount,
                        $transaction->transaction_type,
                        $transaction->date_time,
                        $actions
                    ];
                }
            @endphp

            {{-- Renderizar la tabla genérica --}}
            <x-table-responsive :title=" 'Transactions of '.$account->account_type " :object="$transactionsData" />
        </div>
    @endforeach

</x-layout>
