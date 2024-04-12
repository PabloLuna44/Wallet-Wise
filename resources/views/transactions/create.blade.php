<x-layout :title="$title">
    <h1>Create New Transaction</h1>
    <x-form :title="$title">
        <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="account_id">Select Account:</label><br>
            <select id="account_id" name="account_id" class="form-select mb-3">
                @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->accountType }}</option>
                @endforeach
            </select><br>

            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="form-control"><br>

            <label for="transactionType">Transaction Type:</label><br>
            <select id="transactionType" name="transactionType" class="form-select mb-3">
                <option value="Depósito">Depósito</option>
                <option value="Retiro">Retiro</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Pago">Pago</option>
            </select><br>


            <label for="dateTime">Date Time:</label><br>
            <input type="datetime-local" id="dateTime" name="dateTime" value="{{ old('dateTime') }}" class="form-control"><br>

            <hr>
            <h2>Archivos</h2>
            <div class="mt-4">
                <x-label for="file" value="{{ __('File') }}" />
                <x-input id="file" class="block mt-1 w-full" type="file" name="file"  />
            </div>


            <input type="submit" value="Submit" class="btn btn-primary">
        </form>

    </x-form>


</x-layout>