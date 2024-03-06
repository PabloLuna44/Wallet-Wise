<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inversiones</title>
</head>

<body>

    <h1>Inversiones</h1>


    <main>

        @foreach($investments as $investment)

            <h2>Gasto</h2>
            <p>{{$investment->type}}</p>
            <p>{{$investment->amount}}</p>
            <p>{{$investment->investmentDate}}</p>
            <p>{{$investment->return}}</p>
            <p>{{$investment->status}}</p>

            <a href="{{route('investment.show',$investment)}}">Ver Inversion</a> |
                <a href="{{route('investment.edit',$investment)}}">Editar</a> |
                <form action="{{ route('investment.destroy',$investment)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="Eliminar">
                </form>


        @endforeach

    </main>


    


</body>

</html>