<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Mail\resetPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\Pedido;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcomPage');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

//Protejo estas ruta de los usuarios ya logeados.
//si ya esta logeado se le enviará a la welcom page
Route::middleware('guest')->controller(UserController::class)->group(function (){

    Route::get('/login','loginVista')->name('show.login');
    Route::get('/signup','vistaRegistro')->name('registroVista');
    Route::post('/login','login')->name('login');
    Route::post('/signup','registro')->name('registro');
});


//Cojo todas las rutas que quiero proteger y las agrupos aquí para que todas tenga el mismo middleware
Route::middleware('auth')->group(function (){

    //Obtengo todas las categorias
Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

//Obtengo todos los prodcutos
Route::get('/products/get/type',[ProductosController::class,'getAllProductos'])->name('getAllProductos');

//Productos por categorias
Route::get('/products/get',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

Route::get('/pedido/create',[PedidosController::class,'formPedido'])->name('pedidos.form');

//Busqueda
Route::post('/search',[ProductosController::class,'search'])->name('search');

//Inserta un pedido
Route::post('/setOrder',[PedidosController::class,'setOrder'])->name('pedidos.setOrder');

Route::get('/history',[PedidosController::class,'history'])->name('pedidos.history');
});

Route::get('/forgot', function(){

     try {
        Mail::to('mendezyeneviel@gmail.com')->send(new \App\Mail\resetPassword());
        return "Mensaje enviado";
    } catch (\Exception $e) {
        return "Error al enviar el correo: " . $e->getMessage();
    }
});





