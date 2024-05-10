<x-layout-pdf :title="$title">

    <h1>Accounts</h1>
    <h2>User: {{$userName}} </h2>
    <h2>Email: {{$userEmail}} </h2>

    <h1>Download Accounts Information PDF</h1>
    <a class="btn btn-primary m-2" href="{{ route('pdf.accounts') }}">Click Here</a>

    


</x-layout-pdf>