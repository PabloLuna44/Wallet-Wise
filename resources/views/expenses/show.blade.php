<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasto</title>
</head>
<body>

@include('templates.header')


<main>

<h1>main</h1>

<p>{{$expense->description}}</p>
<p>{{$expense->spending}}</p>
<p>{{$expense->expenseDate}}</p>

</main>


@include('templates.footer')

    
</body>
</html>