<!-- resources/views/earnings/index.blade.php -->
<h1>Earnings</h1>

<a href="{{ route('earnings.create') }}">Create New Earning</a>

@if ($earnings->isEmpty())
    <p>No earnings yet.</p>
@else
    <table>
        <tr>
            <th>Description</th>
            <th>Gain</th>
            <th>Earning Date</th>
            <th>Actions</th>
        </tr>
        @foreach($earnings as $earning)
            <tr>
                <td>{{ $earning->description }}</td>
                <td>{{ $earning->gain }}</td>
                <td>{{ $earning->earningDate }}</td>
                <td>
                    <a href="{{ route('earnings.show', $earning->id) }}">View</a>
                    <a href="{{ route('earnings.edit', $earning->id) }}">Edit</a>
                    <form action="{{ route('earnings.destroy', $earning->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endif
