<x-layout :title="$title">
    <div class="container my-5">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">Account</h2>
        </div>

        <!-- Create Account Button -->
        <div class="text-center mb-4">
            <a class="btn btn-success" href="{{ route('accounts.create') }}">Create A New Account</a>
        </div>

        <!-- Accounts List -->
        @foreach ($accounts as $account)
            <div class="card mb-4 shadow-sm bg-secondary">
                <div class="card-body">
                    <!-- Account Type -->
                    <h3 class="card-title">Account Type: {{ $account->account_type }}</h3>

                    <!-- Account Balances -->
                    <p class="card-text">
                        <strong>Initial Balance:</strong> ${{ number_format($account->balance, 2) }}
                    </p>

                    @php
                        $depositTypes = ['Depósito', 'Transferencia'];
                        $withdrawTypes = ['Retiro', 'Pago'];
                        $totalDeposits = $account->transactions->whereIn('transaction_type', $depositTypes)->sum('amount');
                        $totalWithdrawals = $account->transactions->whereIn('transaction_type', $withdrawTypes)->sum('amount');
                        $currentBalance = $account->balance + $totalDeposits - $totalWithdrawals;
                    @endphp

                    <p class="card-text">
                        <strong>Current Balance:</strong> ${{ number_format($currentBalance, 2) }}
                    </p>

                    <!-- Actions Section -->
                    <div class="d-flex justify-content-start flex-wrap">
                        <!-- Edit Account -->
                        <a class="btn btn-primary me-2 mb-2" href="{{ route('accounts.edit', $account->id) }}">Edit</a>

                        <!-- Delete Account -->
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="me-2 mb-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete-button">Delete</button>
                        </form>

                        <!-- View Transactions -->
                        <a class="btn btn-outline-primary mb-2" href="{{ route('transactions.index', ['account_id' => $account->id]) }}">View Transactions</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
    <script>
            document.getElementById('delete-button').addEventListener('click', function (e) {
                  e.preventDefault();
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                        if (result.isConfirmed) {
                              document.getElementById('delete-form').submit();
                        }
                  });
            });
      </script>
</x-layout>
