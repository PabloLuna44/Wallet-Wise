<x-layout :title="$title">
      <div class="container mt-5">
            <h2 class="text-center mb-4">Investments</h2>

            <div class="d-flex justify-content-center mb-4">
                  <a class="btn btn-primary" href="{{ route('investments.create') }}">Create A New Transaction</a>
            </div>

            @php
            $investmentData = [
            ['Type', 'Amount', 'Investment Date', 'Return', 'Status', 'Actions']
            ];

            foreach($investments as $investment){
            $actions = '<a class="btn btn-outline-primary me-2" href="'.route('investments.show', $investment->id).'">View</a> '.
                  '<a class="btn btn-outline-primary me-2" href="'.route('investments.edit', $investment->id).'">Edit</a> '.
                  '<form action="'.route('investments.destroy', $investment->id).'" method="POST" class="d-inline">'.
                  '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                  '<input type="hidden" name="_method" value="DELETE">'.
                  '<button type="submit" class="btn btn-outline-danger">Delete</button>'.
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

            <x-table-responsive :title="'Investments'" :object="$investmentData" />
      </div>
</x-layout>