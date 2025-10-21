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

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="" required>

             <button type="submit" id="btnLogin" name="btnLogin"> Login</button>
        </form>
    </div>
</body>
</html>