<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
</head>
<body>
    <h1>Hola {{Auth::user()->name}}</h1><!--Puedo acceder a las diferentes propiedades como name and email-->
    <a href="{{ route('getCategorias') }}">Ver categorias</a>
    <a href="{{ route('pedidos.form')}}">New pedido</a>
    <ul>
            @foreach ($productos as $products )
                    <li>
                        <div>
                            <p>Nombre producto: {{ $products->nombre_pro }}</p>
                            <p>Categoria: {{ $products->categoria_id}}</p>
                        </div>
                    </li>
            @endforeach
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>

</body>
</html>