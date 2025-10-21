<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
</head>
<body>
    <ul>
            @foreach ($categorias as $categoria )
                    <li>
                        <div>
                            <p>{{ $categoria->categoria }}</p>

                        </div>
                    </li>
            @endforeach
    </ul>
</body>
</html>