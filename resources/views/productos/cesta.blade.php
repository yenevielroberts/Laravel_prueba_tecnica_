<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-orange-100">
      @if($cesta->isEmpty())
        <div class="flex justify-center items-center m-10  bg-teal-800 rounded-lg p-5">
            <h1 class="text-lg text-white ">No has agregado productos a tu cesta<h1>
        </div>
    @endif

  
  

</body>
</html>