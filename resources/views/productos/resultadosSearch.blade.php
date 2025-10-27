<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
<div class="flex flex-col justify-center items-center mt-10 w-full ">
       <div class="flex flex-row items-center w-full">
             <!--Icono close-->
            <a href="{{ route('search') }}"class="flex  justify-center w-20 ">
                <svg class="w-6 h-6 text-black-800 dark:text-white hover:ring-4 ring-teal-800 rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </a>
            <!--Titulos-->
            <div class="flex flex-col  items-center w-full">
             <h1 class="text-2xl font-bold">Resultados </h1>
            </div>
        </div>
    
    <!--Container de las imganes-->
          <div class="flex flex-row flex-wrap justify-evenly items-center mt-5 mb-5  w-9/12 bg-teal-800 rounded-lg p-5">
                @if($resultados->isEmpty())
                    <p class="text-lg text-white">No se ha encontrado resultados que coincidan con tu busqueda</p>
                @endif
                @foreach ($resultados as $products )
                <!--Container individual de una foto-->
                    <div class="flex flex-col items-center">
                        <a href="{{ route('detalle', $products->id) }}">
                            <img src="/img/comida/pasta.png" class="w-50 h-70 rounded-xl hover:ring-4 ring-white">
                        </a>
                        <p class="text-black">{{ $products->nombre_pro }}</p>
                        <p class="rounded-full bg-lime-300 p-1 mt-2 mb-2"> {{ $products->precio_pro}}€</p>
                    </div>
                @endforeach
         </div>
</div>
@if($resultados->count()==10)
     {{ $resultados->links() }}
@endif

</body>
</html>