<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <a href="{{ route('loginVista') }}">Log in</a>
     <a href="{{ route('registroVista') }}">Registro</a>
</body>
</html>