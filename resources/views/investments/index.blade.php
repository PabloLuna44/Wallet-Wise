<x-layout :title="$title">

    <h2>Investments</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('investments.create') }}">Create A New Transaction</a>
    </div>
    <br>
    @php
    $investmentData = [
    ['Type', 'Amount', 'Investment Date', 'Return', 'Status']
    ];
    
    

    foreach($investments as $investment){
    
    $actions='<a class="btn btn-outline-primary m-2" href="'.route('investments.show', $investment->id).'">Ver</a> '.
    '<a class="btn btn-outline-primary m-2" href="'.route('investments.edit', $investment->id).'">Editar</a> '.
    '<form action="'.route('investments.destroy', $investment->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
    $investmentData[] = [
    $investment->type,
    $investment->amount,
    $investment->investment_date,
    $investment->return,
    $investment->status,

    
    $actions
    ];

    }
    @endphp
    
    

    <x-table-responsive :title=" 'Invesrments' " :object="$investmentData" />




</x-layout>