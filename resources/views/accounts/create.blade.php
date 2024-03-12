<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
</head>
<body>
    <h1>Create New Account</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <label for="accountType">Account Type:</label><br>
        <input type="text" id="accountType" name="accountType" value="{{ old('accountType') }}"><br>

        <label for="balance">Balance:</label><br>
        <input type="text" id="balance" name="balance" value="{{ old('balance') }}"><br>

        <button type="submit">Create Account</button>
    </form>
</body>
</html>
