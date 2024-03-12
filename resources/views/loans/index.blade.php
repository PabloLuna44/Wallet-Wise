<!-- resources/views/loans/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans List</title>
</head>
<body>
    <h1>Loans List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('loans.create') }}">Create New Loan</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Interest Rate</th>
                <th>Status</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->amount }}</td>
                    <td>{{ $loan->interestRate }}</td>
                    <td>{{ $loan->status }}</td>
                    <td>{{ $loan->paymentDate }}</td>
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}">View</a>
                        <a href="{{ route('loans.edit', $loan->id) }}">Edit</a>
                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
