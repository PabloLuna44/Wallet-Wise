<!-- resources/views/earnings/edit.blade.php -->
<h1>Edit Earning</h1>

<form method="POST" action="{{ route('earnings.update', $earning->id) }}">
    @csrf
    @method('PUT')
    <label for="description">Description:</label><br>
    <input type="text" id="description" name="description" value="{{ $earning->description }}"><br>

    <label for="gain">Gain:</label><br>
    <input type="text" id="gain" name="gain" value="{{ $earning->gain }}"><br>

    <label for="earningDate">Earning Date:</label><br>
    <input type="date" id="earningDate" name="earningDate" value="{{ $earning->earningDate }}"><br>

    <button type="submit">Update Earning</button>
</form>
