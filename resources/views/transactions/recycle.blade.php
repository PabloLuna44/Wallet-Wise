<x-layout :title="$title">
    <h2>Recycled Transactions</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('transactions.index') }}">Back to Transactions</a>
    </div>
    <br>

    @if ($recycledTransactions->isEmpty())
        <p>No recycled transactions found.</p>
    @else
        @foreach ($recycledTransactions as $account)
            <h3>Account: {{ $account->account_type }}</h3>
            <table class="table">
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
                            <td>{{ $transaction->transaction_type }}</td>
                            <td>{{ $transaction->date_time }}</td>
                            <td>
                                <form action="{{ route('transactions.restore', $transaction->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success m-2">Restore</button>
                                </form>
                                <form action="{{ route('transactions.force-delete', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger m-2">Delete Permanently</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif
</x-layout>