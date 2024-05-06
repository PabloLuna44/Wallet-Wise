<x-layout :title="$title">

    <h2>Expenses</h2>

    <div>
        <a class="btn btn-primary m-2" href="{{ route('expenses.create') }}">Create A New Transaction</a>
    </div>
    <br>
    @php
    $expensesData = [
    ['Description', 'Expending', 'Expense Date','Actions']
    ];
    

    foreach($expenses as $expense){
    
    $actions='<a class="btn btn-outline-primary m-2" href="'.route('expenses.show', $expense->id).'">Ver</a> '.
    '<a class="btn btn-outline-primary m-2" href="'.route('expenses.edit', $expense->id).'">Editar</a> '.
    '<form action="'.route('expenses.destroy', $expense->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
    $expensesData[] = [
    $expense->description,
    $expense->spending,
    $expense->expense_date,
    $actions
    ];

    }
    @endphp
    
    

    <x-table-responsive :title=" 'Expenses' " :object="$expensesData" />




</x-layout>