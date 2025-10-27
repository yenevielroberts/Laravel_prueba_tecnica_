<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Mail\resetPassword;

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


//User logeados
//Cojo todas las rutas que quiero proteger y las agrupos aquí para que todas tenga el mismo middleware
Route::middleware('auth')->group(function (){

//user change password
Route::get('/user/changePassword',[UserController::class,'formChangePassword'])->name('formChangePassword');
Route::post('/user/changePassword',[UserController::class,'changePassword'])->name('changePassword');

//Obtengo todas las categorias
Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

//Obtengo todos los prodcutos
Route::get('/products/get/type',[ProductosController::class,'getAllProductos'])->name('homePage');

//obtener detalle de un producto
Route::get('/producto/get/{productoId}',[ProductosController::class,'getOneProduct'])->name('detalle');
//Productos por categorias
Route::get('/products/get',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

//Form para crear un nuevo pedido
Route::get('/pedido/create',[PedidosController::class,'formPedido'])->name('pedidos.form');

//Busqueda
Route::get('/search',[ProductosController::class,'searchForm'])->name('searchForm');
Route::post('/search',[ProductosController::class,'search'])->name('search');

//Cesta
Route::get('/cesta',[PedidosController::class,'verCesta'])->name('cesta');
Route::get('/cesta/{productoId}',[PedidosController::class,'cesta'])->name('addcesta');

Route::get('/cesta/quitarCantidad/{productoId}',[PedidosController::class,'quitarCantidad'])->name('quitarCantidad');

Route::get('/cesta/eliminar/{productoId}',[PedidosController::class,'eliminarProducto'])->name('eliminarProducto');

//Inserta un pedido
Route::post('/setOrder',[PedidosController::class,'setOrder'])->name('pedidos.setOrder');

//Enviar historial
Route::get('/history',[PedidosController::class,'history'])->name('pedidos.history');
});

//Reset password
Route::get('forgot/form',[UserController::class,'getPasswordForm'])->name('user.getPasswordForm');
Route::get('/forgot/password',[UserController::class,'getEmailForm'])->name('user.getEmailForm');
Route::post('/forgot/sendLink',[UserController::class,'sendlink'])->name('user.sendEmail');
Route::post('/forgot',[UserController::class,'reset'])->name('user.resetPassord');







