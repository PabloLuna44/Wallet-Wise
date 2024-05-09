<x-layout :title="$title">
    <h1>Create New Transaction</h1>
    <x-form :title="$title">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <label for="account_id">Select Account:</label>
            <select id="account_id" name="account_id" class="form-select mb-3" required>
                @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->account_type }}</option>
                @endforeach
            </select>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" class="form-control" min="1" step="0.01" required>

            <label for="transaction_type">Transaction Type:</label>
            <select id="transaction_type" name="transaction_type" class="form-select mb-3" required>
                <option value="Depósito">Depósito</option>
                <option value="Retiro">Retiro</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Pago">Pago</option>
            </select>


            <label for="date_time">Date Time:</label>
            <input type="datetime-local" id="date_time" name="date_time" value="{{ old('date_time') }}" class="form-control" required>


            <input type="submit" value="Submit" class="btn btn-primary">
        </form>

    </x-form>


</x-layout>