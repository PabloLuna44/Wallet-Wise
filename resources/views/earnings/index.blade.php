<x-layout :title="$title">
      <div class="container mt-5">
            <h2 class="text-center mb-4">Earnings</h2>

            <div class="d-flex justify-content-center mb-4">
                  <a class="btn btn-primary" href="{{ route('earnings.create') }}">Create A New Transaction</a>
            </div>

            @php
            $earningsData = [
            ['Description', 'Gain', 'Earning Date', 'Actions']
            ];

            foreach($earnings as $earning){
            $actions = '<a class="btn btn-outline-primary me-2" href="'.route('earnings.show', $earning->id).'">View</a> '.
                  '<a class="btn btn-outline-primary me-2" href="'.route('earnings.edit', $earning->id).'">Edit</a> '.
                  '<form action="'.route('earnings.destroy', $earning->id).'" method="POST" class="d-inline">'.
                  '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                  '<input type="hidden" name="_method" value="DELETE">'.
                  '<button type="submit" class="btn btn-outline-danger">Delete</button>'.
                  '</form>';
            $earningsData[] = [
            $earning->description,
            $earning->gain,
            $earning->earning_date,
            $actions
            ];
            }
            @endphp

            <x-table-responsive :title="'Earnings'" :object="$earningsData" />
      </div>
</x-layout>