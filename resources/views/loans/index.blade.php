<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litado de todos los gastos</title>
</head>

<body>

    <main>

        @foreach($loans as $loan)

            <h2>Gasto</h2>
            <p>{{$loan->amount}}</p>
            <p>{{$loan->interestRate}}</p>
            <p>{{$loan->loanTerm}}</p>
            <p>{{$loan->status}}</p>
            <p>{{$loan->paymentDate}}</p>
        

            <a href="{{route('loans.show',$loan)}}">Ver Gasto</a> |
                <a href="{{route('loans.edit',$loan)}}">Editar</a> |
                <form action="{{ route('loans.destroy',$loan)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>


        @endforeach

    </main>


</body>

</html>