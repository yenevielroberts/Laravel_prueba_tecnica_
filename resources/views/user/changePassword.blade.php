<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <h1>Log in</h1>

        <form method="POST" action="{{ route('changePassword') }}">
            @csrf
            
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="" required>

             <label for="password_confirmation"> Confirmar ontraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" value="" required>

             <button type="submit" id="btnLogin" name="btnLogin"> Enviar</button>
        </form>
    </div>  
</body>
</html>