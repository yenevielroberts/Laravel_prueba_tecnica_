<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
      @if(session('mensaje'))

       <div id="flas" class="p-4 text-center bg-green-50 text-green-500 font-bold">
        {{ session('mensaje') }}<!--Muestro el valor-->
    </div>  
    @endif
    <div class="flex flex-col items-center w-full">
        <div class="flex flex-row items-center w-full">
             <!--Icono close-->
            <a href="{{ route('homePage') }}"class="flex  justify-center w-20 ">
                <svg class="w-6 h-6 text-black-800 dark:text-white hover:ring-4 ring-teal-800 rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </a>
            <!--Titulos-->
            <div class="flex flex-col  items-center w-full">
                <h1 class="text-2xl mt-10">¿Qué te apetece hoy?</h1>
                <h2 class="text-2xl">¡Busca entre nuestros platos preparados!</h2>
            </div>
        </div>
          <form method="POST" action="{{ route('search') }}" name="search" id="search" class="flex flex-col items-center w-full ">
                @csrf
                <!--Barra de busqueda-->
                <div class="relative w-full md:max-w-5xl max-w-xl mt-10">
                        <svg class="absolute left-3 top-1/2  transform -translate-y-1/2 w-5 h-5 text-black dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    <input type="text" id="keyword" name="keyword" placeholder="Busca por nombre o filtra tu búsqueda..." class="border bg-gray-100 w-full text-gray-400 rounded-full pl-12 focus:outline-none focus:ring-2 focus:ring-teal-800">
                </div>
                <button type="submit" class="hidden"></button>
            </form>

        <form method="GET" action="{{ route('productCategoria') }}" name="search" id="search" class="flex flex-col items-center">
            @csrf
            <!--Seccion: tipo de comida-->
            <div class="flex flex-col mt-10 ">
                <h3 class="text-teal-900 font-bold ml-9">Filtra por tipo de comida</h3>
                <div class="flex flex-row flex-wrap justify-around items-center">
                    @foreach ($tiposComida as  $tipo)
                    <div class="flex h-10 m-5 items-center" >
                           <input type="checkbox" id="{{ $tipo->type_cat }}" name="tiposComida[]" value="{{ $tipo->type_cat }}" class="  w-5 h-5 accent-teal-900">
                        <label for="{{ $tipo->type_cat  }}" class="ml-1">{{ $tipo->type_cat  }}</label>
                    </div>
                    @endforeach
                </div>
          
            </div>
              <!--Seccion: alergenos-->
            <div class="flex flex-col mt-10 ">
                 <h3 class="text-teal-900 font-bold ">Filtra según tus alergias</h3>
                 <div class="flex flex-row flex-wrap justify-around items-center">
                      @foreach ($alergenos as  $alergeno)
                            <div class="flex h-10 m-5 items-center">
                                <input type="checkbox" id="{{ $alergeno->nombre_ale }}" name="alergenos[]" value="{{ $alergeno->nombre_ale }}" class="  w-5 h-5 accent-teal-900">
                                <label for="{{ $alergeno->nombre_ale  }}" class="ml-1">{{ $alergeno->nombre_ale  }}</label>
                            </div>
                       @endforeach
                 </div>
            </div>
            <!--button busqueda-->
            <x-footer>
                <button type="submit"class="flex justify-end w-full mr-5 text-white items-center">
                     <svg class="w-5 h-5 text-white dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                REALIZAR BÚSQUEDA</button>
            </x-footer>
        </form>
    </div>
</body>
</html>