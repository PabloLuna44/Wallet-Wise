<!-- resources/views/earnings/create.blade.php -->
<h1>Create New Earning</h1>

<form method="POST" action="{{ route('earnings.store') }}">
    @csrf
    <label for="description">Description:</label><br>
    <input type="text" id="description" name="description"><br>

    <label for="gain">Gain:</label><br>
    <input type="text" id="gain" name="gain"><br>

    <label for="earningDate">Earning Date:</label><br>
    <input type="date" id="earningDate" name="earningDate"><br>

    <button type="submit">Create Earning</button>
</form>
