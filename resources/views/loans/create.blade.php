<!-- resources/views/loans/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Loan</title>
</head>
<body>
    <h1>Create Loan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('loans.store') }}">
        @csrf

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ old('amount') }}"><br>

        <label for="interestRate">Interest Rate:</label><br>
        <input type="text" id="interestRate" name="interestRate" value="{{ old('interestRate') }}"><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Pagada" {{ old('status') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option value="Vencido" {{ old('status') == 'Vencido' ? 'selected' : '' }}>Vencido</option>
        </select><br>

        <label for="paymentDate">Payment Date:</label><br>
        <input type="date" id="paymentDate" name="paymentDate" value="{{ old('paymentDate') }}"><br>

        <button type="submit">Create Loan</button>
    </form>
</body>
</html>
