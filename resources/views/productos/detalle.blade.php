<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
    <div class="flex flex-col">
       <!--Container para la imagen-->
        <div class="flex flex-row">
            <div class="w-full h-full">
                <img src="/img/comida/pasta.png" class="w-full h-screen">
             </div>
              <!--Container para el detalle-->
            <div class="w-full">
                <header class="flex items-center">
                    <nav class="flex flex-row flex-wrap w-full items-center justify-between">
                        <div class="m-5">
                            <img src="/img/vector.png" class="  md:w-10 w-10">
                        </div>
                        <a href="{{ route('homePage') }}" class="md:m-2">Comida</a>
                        <a>Historial</a>
                        <a>Cesta</a>
                        <a href="{{ route('searchForm') }}"class="m-3 flex items-center">
                            <svg class="w-5 h-5 text-black dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        Buscar</a>
                    <a href="" class="m-3 flex items-center">
                        <svg class="w-6 h-6 text-black dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    Perfil</a>
                    </nav>
                </header>
                <!--Descripción-->
                <div class="flex flex-col items-start ml-10 mt-10">
                    <h1 class="text-5xl font-bold mb-8">{{$producto->nombre_pro}}</h1>
                    <p class="rounded-full bg-teal-800 p-2 w-20" >{{$producto->precio_pro}}€</p>
                    <p class="text-teal-800 mt-10 font-bold">Sobre el producto</p>
                    <p class="mt-3"><span  class="text-teal-800 mt-10 font-bold">Tipo de comida: </span>{{ $producto->categoria->type_cat }}</p>
                    <p>{{ $producto->descripcion_pro }}</p>

                    <!--Alergenos-->
                    <div class="flex flex-row mt-2">
                        @foreach ( $producto->alergenos as $alergeno )
                            <p>Contiene {{$alergeno->nombre_ale}}</p>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

           <div class="fixed bottom-0 left-0 flex flex-row bg-teal-800 w-full items-center  h-15">
                 <div class="flex justify-start w-full">
                <img src="/img/Group 348.png" class="w-30 ml-5">
                </div>
                
                <a href="{{ route('cesta',$producto->id) }}" type="submit"class="flex justify-end w-full mr-5 text-white items-center">
                    <svg class="w-6 h-6 text-white dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>

                AÑADIR A LA CESTA</a>
            </div>
    </div>
</body>
</html>