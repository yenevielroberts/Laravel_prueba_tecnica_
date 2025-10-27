<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
    <!--header-->
    <header class="bg-orange-100 h-20 flex items-center">
        <nav class="flex flex-row w-full items-center justify-between">
            <div class="flex flex-row w-full ml-5">
                <a href="{{ route('homePage') }}" class="m-2 hover:text-teal-800">Comida</a>
                <a href="" class="m-2 hover:text-teal-800">Historial</a> 
                <a href="{{ route('cesta') }}"class="m-2 hover:text-teal-800">Cesta</a> 
            </div>
            <div class="flex w-full m-3 justify-center">
                 <img src="/img/LOGO.png" class="w-25 h-10">
            </div>
            <div class="flex flex-row w-full justify-end mr-5">
                <a href="{{ route('searchForm') }}"class="m-3 flex items-center"><svg class="w-5 h-5 text-black dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>Buscar</a>
                <a href="{{ route('user.perfil') }}" class="m-3 flex items-center">
                    <svg class="w-6 h-6 text-black dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                Perfil</a>
            </div>
        </nav>
    </header>
{{ $slot }}
</body>
</html>