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

<p>{{$loan->amount}}</p>
<p>{{$loan->interestRate}}</p>
<p>{{$loan->loanTerm}}</p>
<p>{{$loan->status}}</p>
<p>{{$loan->paymentDate}}</p>


</main>


@include('templates.footer')

    
</body>
</html>