
<x-layout>

        <h1>Registro de gasto</h1>

<body>

  

        <h1>Form</h1>

        <form method="POST" action="/expense">

            @csrf

            <label for="description">Description</label>
            <input type="text" name="description" id="description">

            <label for="spending">Gasto</label>
            <input type="number" name="spending" id="spending">

            <label for="expenseDate">Fecha</label>
            <input type="date" name="expenseDate" id="expenseDate">

            <input type="submit" value="Enviar">

        </form>


</x-layout>

    </main>


    


</body>


