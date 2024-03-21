<x-layout :title="$title">

    <h1>Accounts</h1>
    <div>
        <a class="btn btn-primary m-2" href="{{ route('accounts.create') }}">Create New Account</a>
    </div>
    @php

    $AccountData = [
    ['Account Type', 'Balance']
    ];
    foreach ($accounts as $account) {
    $actions = '<a class="btn btn-outline-primary m-2" href="'.route('accounts.show', $account->id).'">Ver</a> '.
    '<a class="btn btn-outline-primary m-2" href="'.route('accounts.edit', $account->id).'">Editar</a> '.
    '<form action="'.route('accounts.destroy', $account->id).'" method="POST">'.
        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
        '<input type="hidden" name="_method" value="DELETE">'.
        '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
        '</form>';
    $AccountData[] = [
    $account->accountType,
    $account->balance,
    $actions
    ];
    }
    @endphp

    {{-- Renderizar la tabla genérica --}}
    <x-table-responsive :title="$title" :object="$AccountData" />
</x-layout>