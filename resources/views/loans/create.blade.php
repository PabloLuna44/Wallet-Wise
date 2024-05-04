<!-- resources/views/loans/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Loan</title>
</head>
<body>
    <h1>Create Loan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('loans.store') }}">
        @csrf

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ old('amount') }}"><br>

        <label for="interestRate">Interest Rate:</label><br>
        <input type="text" id="interestRate" name="interestRate" value="{{ old('interestRate') }}"><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Pagada" {{ old('status') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option value="Vencido" {{ old('status') == 'Vencido' ? 'selected' : '' }}>Vencido</option>
        </select><br>

        <label for="paymentDate">Payment Date:</label><br>
        <input type="date" id="paymentDate" name="paymentDate" value="{{ old('paymentDate') }}"><br>

        <label for="selectedUser">Select User:</label><br>
        <select id="selectedUser" name="selectedUser">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br>

        <button type="button" onclick="addUser()">Add User</button>

        <div id="selectedUsers">
            <!-- Aquí se mostrarán los usuarios seleccionados -->
        </div>

        <input type="hidden" id="selectedUserIds" name="selectedUserIds" value="">

        <button type="submit">Create Loan</button>
    </form>

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
</body>
</html>
