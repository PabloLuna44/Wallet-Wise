<x-layout :title="$title">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Account Transactions</h2>

        <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-primary me-2" href="{{ route('transactions.create') }}">Create A New Transaction</a>
            <a href="{{ route('transactions.recycle')}}" class="btn btn-primary">Recycle Bin</a>
        </div>
        
        @foreach ($accounts as $account)
            
        
        <div class="card mb-4 bg-secondary">
            <div class="card-header">
                <h3 class="card-title">Account Type: {{ $account->account_type }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Initial Balance:</strong> {{ $account->balance }}</p>
                @php
                $depositTypes = ['Depósito', 'Transferencia'];
                $withdrawTypes = ['Retiro', 'Pago'];
                $totalDeposits = $account->transactions->whereIn('transaction_type', $depositTypes)->sum('amount');
                $totalWithdrawals = $account->transactions->whereIn('transaction_type', $withdrawTypes)->sum('amount');
                $currentBalance = $account->balance + $totalDeposits - $totalWithdrawals;
                @endphp
                <p><strong>Total Transactions:</strong> {{ $totalDeposits - $totalWithdrawals }}</p>
                <p><strong>Current Balance:</strong> {{ $currentBalance }}</p>
                @php
                $transactionsData = [
                ['Amount', 'Type', 'Date', 'Actions']
                ];
                foreach ($account->transactions as $transaction) {
                
                $actions = '<a class="btn btn-outline-primary me-2" href="'.route('transactions.show', $transaction->id).'">View</a> '.
                '<a class="btn btn-outline-primary me-2" href="'.route('transactions.edit', $transaction->id).'">Edit</a> '.
                '<form action="'.route('transactions.destroy', $transaction->id).'" method="POST" class="d-inline">'.
                    '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<button type="submit" class="btn btn-outline-danger">Delete</button>'.
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
                <x-table-responsive :title="'Transactions of '.$account->account_type" :object="$transactionsData" :tableId="'dataTable-'.$account->id" />
            </div>
        </div>
        @endforeach
    </div>
</x-layout>