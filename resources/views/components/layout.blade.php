<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
     <header class="flex justify-center mt-10" >
          <img src="img/LOGO.png" class=" w-70 h-25 ">
     </header>
     <main class="flex flex-col items-center w-screen mt-10">
        {{ $slot }}
     </main>
</body>
</html>