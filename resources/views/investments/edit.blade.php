<x-layout :title="$title">

    <h2>{{$title}}</h2>
    <x-form :title="$title">

        <form method="POST" action="{{ route('investments.store') }}">
            @csrf
            <label for="type">Type:</label><br>
            <input type="text" id="type" name="type" class="form-control " value="{{ old('type',$investment->type) }}"><br>

            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="form-control " value="{{ old('amount',$investment->amount) }}"><br>

            <label for="investment_date">Investment Date:</label><br>
            <input type="date" id="investment_date" name="investment_date" class="form-control mb-3" value="{{ old('investment_date',$investment->investment_date) }}"><br>

            <label for="return">Return:</label><br>
            <input type="text" id="return" name="return" class="form-control " value="{{ old('return',$investment->return) }}"><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" class="form-select form-select-sm mb-3">
                <option value="En curso" {{ old('status',$investment->status) == 'En curso' ? 'selected' : '' }}>En curso</option>
                <option value="Finalizado" {{ old('status',$investment->status) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select><br>

            <input type="submit" value="Enviar" class="btn btn-primary">
        </form>

    </x-form>
</x-layout>