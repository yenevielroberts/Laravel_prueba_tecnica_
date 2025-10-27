<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form method="POST" action="{{ route('pedidos.setOrder') }}">
        @csrf
        <label for="pickup_day">Pickup day</label>
        <input type="date" id="pickup_day" name="pickup_day" value="" required>

         <label for="pickup_time">Pickup time</label>
        <input type="time" id="pickup_time" name="pickup_time" value="" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="" required>

        <select name="payment_type" id="payment_type">
            <option name="efectivo">Efectivo</option>
            <option name="tarjeta">Tarjeta</option>
        </select>
        <button id="btnCreatePedido" name="btnCreatePedido">Crear nuevo pedido</button>
    </form>
</body>
</html>