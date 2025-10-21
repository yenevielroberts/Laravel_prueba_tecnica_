<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <h1>registro</h1>

        <form method="POST" action="{{ route('registro') }}">
            @csrf

            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="" required>

            <button type="submit" id="btnRegistro" name="btnRegistro"> Registrarse</button>
        </form>
    </div>
</body>
</html>