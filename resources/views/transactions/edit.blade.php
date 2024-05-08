<x-layout :title="$title">

    <x-form :title="$title">
        <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
            @csrf
            @method('PUT')

            <label for="accounts_id">Account</label>
            <select id="accounts_id" name="accounts_id" class="form-select mb-3">
                @foreach($accounts as $account)
                <option value="{{$account->id}}">{{$account->account_type}}</option>
                @endforeach
            </select>

            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}"><br>

            <label for="transaction_type">Transaction Type:</label>
            <select id="transaction_type" name="transaction_type" class="form-select mb-3">
                <option value="Depósito" {{ old('transaction_type',$transaction->transaction_type) == 'Depósito' ? 'selected' : '' }} Depósito</option>
                <option value="Retiro" {{ old('transaction_type',$transaction->transaction_type) == 'Retiro' ? 'selected' : '' }}>Retiro</option>
                <option value="Transferencia" {{ old('transaction_type',$transaction->transaction_type) == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                <option value="Pago" {{ old('transaction_type',$transaction->transaction_type) == 'Pago' ? 'selected' : '' }}>Pago</option>
            </select>


            <label for="date_time">Date Time:</label>
            <input type="datetime-local" id="date_time" name="date_time" class="form-control" value="{{ old('date_time', date('Y-m-d\TH:i', strtotime($transaction->date_time))) }}"><br>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>

    </x-form>

</x-layout>