
<x-layout :title="$title">

        <h2>{{$title}}</h2>
      <x-form :title="$title">


    <form method="POST" action="{{ route('loans.store') }}">
        @csrf

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" class="form-control mb-3" value="{{ old('amount') }}">

        <label for="interest_rate">Interest Rate:</label>
        <input type="text" id="interest_rate" name="interest_rate" class="form-control mb-3" value="{{ old('interest_rate') }}">

        <label for="status">Status:</label><br>
        <select id="status" name="status" class="form-select">
            <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Pagada" {{ old('status') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option value="Vencido" {{ old('status') == 'Vencido' ? 'selected' : '' }}>Vencido</option>
        </select><br>

        <label for="payment_date">Payment Date:</label><br>
        <input type="date" id="paymentDate" name="payment_date" class="form-control mb-3" value="{{ old('payment_date') }}">

        <label for="selectedUser">Select User:</label>
        <select id="selectedUser" name="selectedUser" class="form-select mb-3">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br>

        <button type="button" onclick="addUser()" class="form-control mb-3">Add User</button>

        <div id="selectedUsers">
            <!-- Aquí se mostrarán los usuarios seleccionados -->
        </div>

        <input type="hidden" id="selectedUserIds" class="form-control mb-3" name="selectedUserIds" value="">

        <input type="submit" value="Create Loan" class="btn btn-primary">
    </form>


    
    </x-form>
</x-layout>


    <script>
        var selectedUsers = [];
    
        function addUser() {
            var userId = document.getElementById("selectedUser").value;
            var userName = document.getElementById("selectedUser").options[document.getElementById("selectedUser").selectedIndex].text; // Obtiene el nombre del usuario seleccionado
            selectedUsers.push({id: userId, name: userName}); // Almacena el ID y el nombre del usuario
            displaySelectedUsers();
        }
    
        function displaySelectedUsers() {
            var selectedUsersDiv = document.getElementById("selectedUsers");
            selectedUsersDiv.innerHTML = "";
            selectedUsers.forEach(function(user) {
                var userElement = document.createElement("div");
                userElement.textContent = "User: " + user.name; // Muestra el nombre del usuario
                selectedUsersDiv.appendChild(userElement);
            });
            document.getElementById("selectedUserIds").value = selectedUsers.map(user => user.id).join(","); // Almacena solo los IDs separados por coma
        }
    </script>    

