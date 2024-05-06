<x-layout :title="$title">

    <h2>Earnings</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('earnings.create') }}">Create A New Transaction</a>
    </div>
    <br>
    @php
    $earningsData = [
    ['Description', 'Gain', 'Earning Date','Actions']
    ];
    

    foreach($earnings as $earning){
    
    $actions='<a class="btn btn-outline-primary m-2" href="'.route('earnings.show', $earning->id).'">Ver</a> '.
    '<a class="btn btn-outline-primary m-2" href="'.route('earnings.edit', $earning->id).'">Editar</a> '.
    '<form action="'.route('expenses.destroy', $earning->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
    $earningsData[] = [

    $earning->description,
    $earning->gain,
    $earning->earning_date,
    
    $actions
    ];

    }
    @endphp
    
    

    <x-table-responsive :title=" 'Earnings' " :object="$earningsData" />




</x-layout>