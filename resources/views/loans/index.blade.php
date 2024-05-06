<x-layout :title="$title">

    <h2>Loans</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('loans.create') }}">Create A New Loan</a>
    </div>
    <br>
    @php
    $loanData = [
    ['Amount', 'Interest Rate', 'Status', 'Payment Date']
    ];
    

    foreach($loans as $loan){
    
    $actions='<a class="btn btn-outline-primary m-2" href="'.route('loans.show', $loan->id).'">Ver</a> '.
    '<a class="btn btn-outline-primary m-2" href="'.route('loans.edit', $loan->id).'">Editar</a> '.
    '<form action="'.route('loans.destroy', $loan->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
    $loanData[] = [
    $loan->amount,
    $loan->interest_rate,
    $loan->status,
    $loan->payment_date,

    $actions
    ];

    }
    @endphp
    
    

    <x-table-responsive :title=" 'Loans' " :object="$loanData" />




</x-layout>