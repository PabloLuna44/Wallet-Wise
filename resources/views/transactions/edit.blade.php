<x-layout :title="$title">

    <x-form :title="$title">
        <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            @csrf
            @method('PUT')

            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}"><br>

            <label for="transactionType">Transaction Type:</label><br>
            <select id="transactionType" name="transactionType" class="form-select mb-3">
                <option value="Depósito" {{ $transaction->transactionType == 'Depósito' ? 'selected' : '' }}>Depósito</option>
                <option value="Retiro" {{ $transaction->transactionType == 'Retiro' ? 'selected' : '' }}>Retiro</option>
                <option value="Transferencia" {{ $transaction->transactionType == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                <option value="Pago" {{ $transaction->transactionType == 'Pago' ? 'selected' : '' }}>Pago</option>
            </select><br>

            <label for="accounts_id">Account</label><br>
            <select id="accounts_id" name="accounts_id" class="form-select mb-3">
                @foreach($accounts as $account)
                <option value="{{$account->id}}">{{$account->accountType}}</option>
                @endforeach
            </select><br>


            <label for="dateTime">Date Time:</label><br>
            <input type="datetime-local" id="dateTime" name="dateTime" class="form-control" value="{{ old('dateTime', date('Y-m-d\TH:i', strtotime($transaction->dateTime))) }}"><br>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>

    </x-form>

</x-layout>