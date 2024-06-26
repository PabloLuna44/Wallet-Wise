
<x-layout :title="$title">

        <h2>{{$title}}</h2>
      <x-form :title="$title">

      
        <form method="POST" action="{{ route('expenses.store') }}">

            @csrf

          
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control mb-3" value="{{ old('description') }}" required>

            <label for="spending">Gasto</label>
            <input type="number" name="spending" id="spending" class="form-control mb-3" value="{{ old('spending') }}" min="1" step="0.01" required>

            <label for="expense_date">Fecha</label>
            <input type="date" name="expense_date" id="expense_date" class="form-control mb-3" value="{{ old('expense_date') }}" required>

            <input type="submit" value="Enviar" class="btn btn-primary">

            

        </form>

        </x-form>
</x-layout>


