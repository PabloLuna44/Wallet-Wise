<x-layout :title="$title">
    <h1>Create New Account</h1>
    <x-form :title="$title">
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="accountType">Account Type:</label><br>
            <input type="text" id="accountType" name="accountType" class="form-control" value="{{ old('accountType', $account->accountType) }}"><br>

            <label for="balance">Balance:</label><br>
            <input type="text" id="balance" name="balance" class="form-control" value="{{ old('balance', $account->balance) }}"><br>

            <button type="submit" class="btn btn-primary" >Update Account</button>
        </form>
    </x-form>
</x-layout>