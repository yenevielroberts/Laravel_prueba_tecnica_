<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
</head>
<body>
    <a href="{{ route('getCategorias') }}">Ver categorias</a>
    <ul>
            @foreach ($productos as $products )
                    <li>
                        <div>
                            <p>{{ $products->nombre }}</p>
                        </div>
                    </li>
            @endforeach
    </ul>
</body>
</html>