<x-layout :title="$title">
    <h1>Create New Account</h1>
    <x-form :title="$title">
        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf
            <label for="account_type">Account Type:</label><br>
            <input type="text" id="accoun_type" name="account_type" class="form-control" value="{{ old('account_type') }}"><br>

            <label for="balance">Balance:</label><br>
            <input type="text" id="balance" name="balance" class="form-control" value="{{ old('balance') }}"><br>

            <button type="submit" class="btn btn-primary" >Create Account</button>
        </form>

    </x-form>
</x-layout>