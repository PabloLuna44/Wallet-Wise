<x-layout :title="$title">
      <div class="container mt-5">
            <h2 class="text-center mb-4">Recycled Transactions</h2>

            <div class="d-flex justify-content-center mb-4">
                  <a class="btn btn-primary" href="{{ route('transactions.index') }}">Back to Transactions</a>
            </div>

            @if ($recycledTransactions->isEmpty())
            <p class="text-center">No recycled transactions found.</p>
            @else
            @foreach ($recycledTransactions as $account)
            <div class="card mb-4 bg-secondary">
                  <div class="card-header">
                        <h3 class="card-title">Account: {{ $account->account_type }}</h3>
                  </div>
                  <div class="card-body">
                        <table class="table table-hover table-striped">
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
                                                <div class="d-flex">
                                                      <form action="{{ route('transactions.restore', $transaction->id) }}" method="POST" class="me-2">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-success">Restore</button>
                                                      </form>
                                                      <form action="{{ route('transactions.force-delete', $transaction->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger">Delete Permanently</button>
                                                      </form>
                                                </div>
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
            @endforeach
            @endif
      </div>
</x-layout>