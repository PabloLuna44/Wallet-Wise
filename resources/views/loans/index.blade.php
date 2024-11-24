<x-layout :title="$title">
      <div class="container mt-5">
            <h2 class="text-center mb-4">Loans</h2>

            <div class="d-flex justify-content-center mb-4">
                  <a class="btn btn-primary" href="{{ route('loans.create') }}">Create A New Loan</a>
            </div>

            @php
            $loanData = [
            ['Amount', 'Interest Rate', 'Status', 'Payment Date', 'Actions']
            ];

            foreach($loans as $loan){
            $actions = '<a class="btn btn-outline-primary me-2" href="'.route('loans.show', $loan->id).'">View</a> '.
                  '<a class="btn btn-outline-primary me-2" href="'.route('loans.edit', $loan->id).'">Edit</a> '.
                  '<form action="'.route('loans.destroy', $loan->id).'" method="POST" class="d-inline">'.
                  '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                  '<input type="hidden" name="_method" value="DELETE">'.
                  '<button type="submit" class="btn btn-outline-danger">Delete</button>'.
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

            <x-table-responsive :title="'Loans'" :object="$loanData" />
      </div>
</x-layout>