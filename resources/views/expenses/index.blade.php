<x-layout :title="$title">
      <div class="container mt-5">
            <h2 class="text-center mb-4">Expenses</h2>

            <div class="d-flex justify-content-center mb-4">
                  <a class="btn btn-primary" href="{{ route('expenses.create') }}">Create A New Transaction</a>
            </div>

            @php
            $expensesData = [
            ['Description', 'Spending', 'Expense Date', 'Actions']
            ];

            foreach($expenses as $expense){
            $actions = '<a class="btn btn-outline-primary me-2" href="'.route('expenses.show', $expense->id).'">View</a> '.
                  '<a class="btn btn-outline-primary me-2" href="'.route('expenses.edit', $expense->id).'">Edit</a> '.
                  '<form action="'.route('expenses.destroy', $expense->id).'" method="POST" class="d-inline">'.
                  '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                  '<input type="hidden" name="_method" value="DELETE">'.
                  '<button type="submit" class="btn btn-outline-danger">Delete</button>'.
                  '</form>';
            $expensesData[] = [
            $expense->description,
            $expense->spending,
            $expense->expense_date,
            $actions
            ];
            }
            @endphp

            <x-table-responsive :title="'Expenses'" :object="$expensesData" />
      </div>
</x-layout>