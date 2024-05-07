<x-layout :title="$title">
    <h2>Recycled Transactions</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('transactions.index') }}">Back to Transactions</a>
    </div>
    <br>

    @if ($recycledTransactions->isEmpty())
        <p>No recycled transactions found.</p>
    @else
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
                @foreach ($recycledTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->transactionType }}</td>
                        <td>{{ $transaction->dateTime }}</td>
                        <td>
                            <form action="{{ route('transactions.restore', $transaction->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success m-2">Restore</button>
                            </form>
                            <form action="{{ route('transactions.delete-permanently', $transaction->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger m-2">Delete Permanently</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>
