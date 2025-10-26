<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
    <h1>Resultados </h1>
    <div>
          <div class="flex flex-row flex-wrap justify-evenly  mt-5 mb-5">
            @foreach ($resultados as $products )
                <div class="flex flex-col items-center">
                    <img src="/img/comida/pasta.png" class="w-50 h-70 rounded-xl hover:ring-4 ring-white">
                    <p class="text-black">{{ $products->nombre_pro }}</p>
                    <p class="rounded-full bg-lime-300 p-1 mt-2 mb-2"> {{ $products->precio_pro}}€</p>
                </div>
            @endforeach
         </div>
    </div>
</body>
</html>