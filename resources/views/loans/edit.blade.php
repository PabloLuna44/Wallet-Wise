<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Loan</title>
</head>
<body>
    <h1>Edit Loan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('loans.update', $loan->id) }}">
        @csrf
        @method('PUT')

        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" value="{{ $loan->amount }}"><br>

        <label for="interestRate">Interest Rate:</label><br>
        <input type="text" id="interestRate" name="interestRate" value="{{ $loan->interestRate }}"><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Pendiente" {{ $loan->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Pagada" {{ $loan->status == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option value="Vencido" {{ $loan->status == 'Vencido' ? 'selected' : '' }}>Vencido</option>
        </select><br>

        <label for="paymentDate">Payment Date:</label><br>
        <input type="date" id="paymentDate" name="paymentDate" value="{{ $loan->paymentDate }}"><br>

        <!-- Agregar usuarios -->
        <label for="selectedUser">Add User:</label>
        <select id="selectedUser" name="selectedUser">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="button" onclick="addUser()">Add User</button>

        <!-- Lista de usuarios seleccionados -->
        <div id="selectedUsers">
            @foreach ($loan->users as $user)
                <div>User: {{ $user->name }}
                    <button type="button" onclick="removeUser({{ $user->id }})">Remove</button>
                </div>
            @endforeach
        </div>

        <!-- IDs de usuarios seleccionados -->
        <input type="hidden" id="selectedUserIds" name="selectedUserIds" value="{{ $loan->users->pluck('id')->implode(',') }}">

        <button type="submit">Update Loan</button>
    </form>

    <script>
        var selectedUsers = {!! json_encode($loan->users->pluck('id')->toArray()) !!};

        function addUser() {
            var userId = document.getElementById("selectedUser").value;
            selectedUsers.push(userId);
            displaySelectedUsers();
        }

        function removeUser(userId) {
            var index = selectedUsers.indexOf(userId);
            if (index !== -1) {
                selectedUsers.splice(index, 1);
                displaySelectedUsers();
            }
        }

        function displaySelectedUsers() {
            var selectedUsersDiv = document.getElementById("selectedUsers");
            selectedUsersDiv.innerHTML = "";
            selectedUsers.forEach(function(userId) {
                var user = {!! $users->pluck('name', 'id')->toJson() !!}[userId];
                if (user) {
                    var userElement = document.createElement("div");
                    userElement.textContent = "User: " + user;
                    var removeButton = document.createElement("button");
                    removeButton.textContent = "Remove";
                    removeButton.addEventListener("click", function() {
                        removeUser(userId);
                    });
                    userElement.appendChild(removeButton);
                    selectedUsersDiv.appendChild(userElement);
                }
            });
            document.getElementById("selectedUserIds").value = selectedUsers.join(",");
        }
    </script>
</body>
</html>
