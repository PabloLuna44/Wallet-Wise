
<x-layout>

        <h1>Registro de prestamo</h1>
    
<x-layout>

<h1>Registro de prestamo</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{route('investment.update',$invesment)}}">

    @csrf

    <label for="amount">Monto de el prestamos</label>
    <input type="number" name="amount" id="amount" value="{{$investment->amount}}">

    <label for="interestRate">Interes</label>
    <input type="number" name="interestRate" id="interestRate" value="{{$investment->interestRate}}">


    <label for="status">Estado del prestamos</label>
    <select name="status" id="staus">
        <option value="pending">Pendiente</option>
        <option value="paid">Pagada</option>
        <option value="losing">Perdida</option>
    </select>

    <label for="paymentDate">Plazo del prestamos</label>
    <input type="date" name="paymentDate" id="paymentDate" value="{{$investment->paymentDate}}">
    

    <input type="submit" value="Enviar">

</form>

</x-layout>


        <form method="POST" action="/loans">

            @csrf

            <label for="amount">Monto de el prestamos</label>
            <input type="number" name="amount" id="amount">

            <label for="interestRate">Interes</label>
            <input type="number" name="interestRate" id="interestRate">


            <label for="status">Estado del prestamos</label>
            <select name="status" id="staus">
                <option value="pending">Pendiente</option>
                <option value="paid">Pagada</option>
                <option value="losing">Perdida</option>
            </select>

            <label for="paymentDate">Plazo del prestamos</label>
            <input type="date" name="paymentDate" id="paymentDate">
            

            <input type="submit" value="Enviar">

        </form>

</x-layout>

