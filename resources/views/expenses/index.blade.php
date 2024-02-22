<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litado de todos los gastos</title>
</head>

<body>

    @include('templates.header')


    <main>

        @foreach($expenses as $expense)

            <h2>Gasto</h2>
            <p>{{$expense->description}}</p>
            <p>{{$expense->spending}}</p>
            <p>{{$expense->expenseDate}}</p>

            <a href="{{route('expense.show',$expense)}}">Ver Gasto</a> |
                <a href="{{route('expense.edit',$expense)}}">Editar</a> |
                <form action="{{ route('expense.destroy',$expense)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>


        @endforeach

    </main>


    @include('templates.footer')


</body>

</html>