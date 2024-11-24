<x-layout :title="$title">
      <div class="container mt-5">
            <h1 class="text-center mb-5">Edit Account</h1>
            <x-form :title="$title">
                  <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                              <label for="account_type" class="form-label">Account Type:</label>
                              <input type="text" id="account_type" name="account_type" class="form-control" value="{{ old('account_type', $account->account_type) }}" required>
                        </div>

                        <div class="mb-3">
                              <label for="balance" class="form-label">Balance:</label>
                              <input type="number" id="balance" name="balance" class="form-control" value="{{ old('balance', $account->balance) }}" min="1" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Account</button>
                  </form>
            </x-form>
      </div>
</x-layout>