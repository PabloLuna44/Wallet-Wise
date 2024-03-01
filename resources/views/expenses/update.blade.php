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

        <form method="POST" action="{{route('expense.update',$expense)}}">

            @csrf
            @method('PATCH')

            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{$expense->description}}">

            <label for="spending">Gasto</label>
            <input type="number" name="spending" id="spending" value="{{$expense->spending}}">

            <label for="expenseDate">Fecha</label>
            <input type="date" name="expenseDate" id="expenseDate" value="{{$expense->expenseDate}}">

            <input type="submit" value="Enviar">

        </form>

    </main>


    


</body>

</html>