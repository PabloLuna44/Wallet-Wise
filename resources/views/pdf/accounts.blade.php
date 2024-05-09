<x-layout-pdf :title="$title">

    <h1>Accounts</h1>
    <h2>User: {{$userName}} </h2>
    <h2>Email: {{$userEmail}} </h2>


    @php
    $AccountData = [
    ['Account Type', 'Balance']
    ];
    foreach ($accounts as $account) {
    $AccountData[] = [
    $account->account_type,
    $account->balance,
    ];

    }
    @endphp

    {{-- Renderizar la tabla genérica --}}
    <x-table-responsive :title="$title" :object="$AccountData" />

    


</x-layout-pdf>