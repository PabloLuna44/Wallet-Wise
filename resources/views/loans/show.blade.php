<x-layout :title="$title">

    <!-- Table with Loan Data -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h6 class="mb-4">Loan Information</h6>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Amount:</th>
                            <td>{{ $loan->amount }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Interest Rate:</th>
                            <td>{{ $loan->interest_rate }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status:</th>
                            <td>{{ $loan->status }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Payment Date:</th>
                            <td>{{ $loan->payment_date }}</td>
                        </tr>
                        <!-- Row for Associated Users -->
                        <tr>
                            <th scope="row">Associated Users:</th>
                            <td>
                                <ul>
                                    @foreach($loan->users as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{ route('loans.index') }}" class="btn btn-primary m-2">Back to Loans</a>

</x-layout>
