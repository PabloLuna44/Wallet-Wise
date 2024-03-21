<x-layout :title="$title">
    <h2>Account Transactions</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('transactions.create') }}">Create A New Transaction</a>
    </div>
    <br>

    @foreach ($accounts as $account)
        <div>
            <h3>Account Type: {{ $account->accountType }}</h3>
            <p>Balance: {{ $account->balance }}</p>
            @php
                // Organizar los datos de las transacciones de la cuenta en un array
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
                        $transaction->transactionType,
                        $transaction->dateTime,
                        $actions
                    ];
                }
            @endphp

            {{-- Renderizar la tabla genérica --}}
            <x-table-responsive :title=" 'Transactions of '.$account->accountType " :object="$transactionsData" />
        </div>
    @endforeach
</x-layout>
