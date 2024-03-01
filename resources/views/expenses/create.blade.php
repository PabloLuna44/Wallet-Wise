<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar gasto</title>
</head>

<body>

    


    <main>

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

    </main>


    


</body>

</html>