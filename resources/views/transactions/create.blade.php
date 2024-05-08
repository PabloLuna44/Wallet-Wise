<x-layout :title="$title">
    <h1>Create New Transaction</h1>
    <x-form :title="$title">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <label for="account_id">Select Account:</label><br>
            <select id="account_id" name="account_id" class="form-select mb-3">
                @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->account_type }}</option>
                @endforeach
            </select><br>

            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="form-control"><br>

            <label for="transaction_type">Transaction Type:</label><br>
            <select id="transaction_type" name="transaction_type" class="form-select mb-3">
                <option value="Depósito">Depósito</option>
                <option value="Retiro">Retiro</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Pago">Pago</option>
            </select><br>


            <label for="date_time">Date Time:</label><br>
            <input type="datetime-local" id="dateTime" name="date_time" value="{{ old('dateTime') }}" class="form-control"><br>


            <input type="submit" value="Submit" class="btn btn-primary">
        </form>

    </x-form>


</x-layout>