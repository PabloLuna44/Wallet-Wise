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


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/investment">

            @csrf

            

            <label for="type">Tipo de inversion</label>
            <input type="text" name="type" id="type">

            <label for="amount">Monto de la invrsion</label>
            <input type="number" name="amount" id="amount">

            <label for="investmentDate">Fecha de inversion</label>
            <input type="date" name="investmentDate" id="investmentDate">

            <label for="return">Ganacia</label>
            <input type="number" name="return" id="return">

            <label for="status">Estado de la inversion</label>
            <select name="status" id="status">
                <option  selected value="">-------Ingrese el estado de la inversion--------</option>
                <option value="currently">Actualmente</option>
                <option value="finished">Finalizada</option>

            </select>
            

            <input type="submit" value="Enviar">

        </form>

    </main>


    


</body>

</html>