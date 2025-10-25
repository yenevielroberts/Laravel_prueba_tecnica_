<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">

     <main class="flex flex-col justify-center items-center w-screen h-screen border-amber-600  border">
          <h1 class="text-3xl font-bold texr-primary mt-3">Welcom</h1>
          <div class="text-lg font-bold mt-10  items-center  justify-center">  
               <a href="{{ route('show.login') }}"  class=" bg-green-500 p-3 m-5 rounded-full  hover:bg-yellow-300">Log in</a>
               <a href="{{ route('registroVista') }}"  class=" bg-green-500 p-3 m-5 rounded-full  hover:bg-yellow-300">Registro</a>
          </div>
     </main>
</body>
</html>