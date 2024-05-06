<!-- resources/views/earnings/create.blade.php -->

<x-layout :title="$title">

    <h2>{{$title}}</h2>
    <x-form :title="$title">


        <form method="POST" action="{{ route('earnings.update',$earning->id) }}">
            @csrf
            @method('PUT')
            <label for="description">Description:</label>
            <input type="text" id="description" class="form-control mb-3" name="description" value="{{ old('description',$earning->description) }}">

            <label for="gain">Gain:</label>
            <input type="text" id="gain" class="form-control mb-3" name="gain" value="{{ old('gain',$earning->gain) }}">

            <label for="earningDate">Earning Date:</label>
            <input type="date" id="earning_date" class="form-control mb-3" name="earning_date" value="{{ old('earning_date',$earning->earning_date) }}">

            <input type="submit" value="Create Earning" class="btn btn-primary">
        </form>

    </x-form>
</x-layout>