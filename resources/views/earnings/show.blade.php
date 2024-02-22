<!-- resources/views/earnings/show.blade.php -->
<h1>Earning Details</h1>

<p>Description: {{ $earning->description }}</p>
<p>Gain: {{ $earning->gain }}</p>
<p>Earning Date: {{ $earning->earningDate }}</p>

<a href="{{ route('earnings.index') }}">Back to Earnings</a>
