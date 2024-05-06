<x-layout :title="$title">
    <h2>{{$title}}</h2>
    <x-form :title="$title">
        <form method="POST" action="{{ route('loans.update', $loan->id) }}">
            @csrf
            @method('PUT')

            <label for="amount">Amount:</label><br>
            <input type="text" id="amount" name="amount" class="form-control mb-3" value="{{ old('amount',$loan->amount) }}">

            <label for="interest_rate">Interest Rate:</label>
            <input type="text" id="interest_rate" name="interest_rate" class="form-control mb-3" value="{{ old('interest_rate',$loan->interest_rate) }}">

            <label for="status">Status:</label>
            <select id="status" name="status" class="form-select mb-3">
                <option value="Pendiente" {{  old('status',$loan->status) == 'Pendiente' ? 'selected' : ''}}>Pendiente</option>
                <option value="Pagada" {{  old('status',$loan->status) == 'Pagada' ? 'selected' : ''}}>Pagada</option>
                <option value="Vencido" {{  old('status',$loan->status) == 'Vencido' ? 'selected' : ''}}>Vencido</option>
            </select><br>

            <label for="payment_date">Payment Date:</label>
            <input type="date" id="payment_date" name="payment_date" class="form-control mb-3" value="{{ old('payment_date',$loan->payment_date) }}">

            <!-- Agregar usuarios -->
            <label for="selectedUser">Add User:</label>
            <select id="selectedUser" name="selectedUser" class="form-control mb-3">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
             <button type="button" class="btn btn-outline-success m-2" onclick="addUser()">Add User</button>

            <!-- Lista de usuarios seleccionados -->
            <div id="selectedUsers">
                @foreach ($loan->users as $user)
                <div>User: {{ $user->name }}
                    <button type="button" class="btn btn-outline-danger m-2" onclick="removeUser({{ $user->id }})">Remove</button>
                </div>
                @endforeach
            </div>

            <!-- IDs de usuarios seleccionados -->
            <input type="hidden" id="selectedUserIds" name="selectedUserIds" value="{{ $loan->users->pluck('id')->implode(',') }}">

            <input type="submit" value="Edit Loan" class="btn btn-primary">
        </form>
    </x-form>
</x-layout>

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
                removeButton.classList.add("btn", "btn-outline-danger", "m-2");
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
