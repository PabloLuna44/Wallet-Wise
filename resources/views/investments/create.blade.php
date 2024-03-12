<!-- resources/views/investment/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Investment</title>
</head>
<body>
    <h1>Create Investment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('investments.store') }}">
        @csrf
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="{{ old('type') }}"><br>

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ old('amount') }}"><br>

        <label for="investmentDate">Investment Date:</label><br>
        <input type="date" id="investmentDate" name="investmentDate" value="{{ old('investmentDate') }}"><br>

        <label for="return">Return:</label><br>
        <input type="text" id="return" name="return" value="{{ old('return') }}"><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="En curso" {{ old('status') == 'En curso' ? 'selected' : '' }}>En curso</option>
            <option value="Finalizado" {{ old('status') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
        </select><br>

        <button type="submit">Create Investment</button>
    </form>
</body>
</html>
