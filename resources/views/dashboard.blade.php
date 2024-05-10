<x-layout title="Dashboard">

    <h1>Welcome To Wallet Wise</h1>

    <div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h2>Download accounts Information</h2>
        <a class="btn btn-primary m-2" href="{{ route('email.accounts') }}">Click Here</a>
    </div>


</x-layout>