<!-- resources/views/earnings/create.blade.php -->

<x-layout :title="$title">

    <h2>{{$title}}</h2>
    <x-form :title="$title">


        <form method="POST" action="{{ route('earnings.store') }}">
            @csrf
            <label for="description">Description:</label>
            <input type="text" id="description" class="form-control mb-3" name="description" value="{{ old('description') }}" required>

            <label for="gain">Gain:</label>
            <input type="number" id="gain" class="form-control mb-3" name="gain" value="{{ old('gain') }}" min="1" step="0.01" required>

            <label for="earning_date">Earning Date:</label>
            <input type="date" id="earning_date" class="form-control mb-3" name="earning_date" value="{{ old('earning_date') }}" required>

            <input type="submit" value="Create Earning" class="btn btn-primary">
        </form>

    </x-form>
</x-layout>