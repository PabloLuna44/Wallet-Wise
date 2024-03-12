<!-- resources/views/investment/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investments</title>
</head>
<body>
    <h1>Investments</h1>

    <a href="{{ route('investments.create') }}">Create New Investment</a>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Investment Date</th>
                <th>Return</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($investments as $investment)
            <tr>
                <td>{{ $investment->type }}</td>
                <td>{{ $investment->amount }}</td>
                <td>{{ $investment->investmentDate }}</td>
                <td>{{ $investment->return }}</td>
                <td>{{ $investment->status }}</td>
                <td>
                    <a href="{{ route('investments.show', $investment->id) }}">View</a>
                    <a href="{{ route('investments.edit', $investment->id) }}">Edit</a>
                    <form method="POST" action="{{ route('investments.destroy', $investment->id) }}">
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
