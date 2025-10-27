<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
    <h1 class="text-4xl font-bold m-5"> Tu Cesta</h1>
      <!--Icono close-->
        <a href="{{ route('homePage') }}">
            <svg class="w-6 h-6 text-black-800 dark:text-white hover:ring-4 ring-teal-800 rounded-lg ml-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>
        </a>
      @if($cesta->isEmpty())
        <div class="flex justify-center items-center m-10  bg-teal-800 rounded-lg p-5">
            <h1 class="text-lg text-white ">No has agregado productos a tu cesta<h1>
        </div>
    @endif

    <!--Lista de items-->
  <div class="flex fle-col items-center justify-center">
        @foreach ($cesta as $item )
            <div class="flex  flex-row m-5 border w-5/12 p-5 rounded-lg">
                <di>
                    <img src="/img/comida/pasta.png" class="rounded-lg mr-5" >
                </di>
                <!--Info pedido-->
                <div class="mr-30">
                    <h3 class="text-xl font-bold">{{ $item->producto->nombre_pro }}</h3>
                    <p class="font-bold text-teal-800">{{ $item->producto->precio_pro }}€</p>
                    <div class="flex flew-row  border rounded-md justify-center w-20 mt-5">
                       <a href="{{ route('quitarCantidad',$item->producto->id) }}"class="mr-5">-</a>
                       <p class="mr-5">{{ $item->cantidad }}</p>
                       <a href="{{ route('addcesta',$item->producto->id) }}">+</a> 
                    </div>
                </div>
                  <!--Icono close-->
                    <a href="{{ route('eliminarProducto',$item->producto->id) }}">
                        <svg class="w-6 h-6 text-black-800 dark:text-white hover:ring-4 ring-teal-800 rounded-lg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                        </svg>
                    </a>
            </div>
        @endforeach
  </div>
    
    <x-footer>
        <a href="" class="flex justify-end w-full mr-5 text-white items-center">CHECKOUT</a>
    </x-footer>
</body>
</html>