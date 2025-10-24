<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
      <!--Solo se muestra lo que esta dentro de esta directiva si el usuario no esta autenticado, es un invitado-->
    @guest
          <a href="{{ route('show.login') }}">Log in</a>
     <a href="{{ route('registroVista') }}">Registro</a>
    @endguest
  

     <!--Solo se muestra lo que esta dentro de esta directiva si el usuario esta autenticado-->
     @auth
          <a href="{{ route('getCategorias') }}">Ver categorias</a>
     @endauth
    
</body>
</html>