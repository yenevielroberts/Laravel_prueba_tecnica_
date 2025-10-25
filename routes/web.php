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

    //Obtengo todas las categorias
Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

//Obtengo todos los prodcutos
Route::get('/products/get/type',[ProductosController::class,'getAllProductos'])->name('getAllProductos');

//Productos por categorias
Route::get('/products/get',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

Route::get('/pedido/create',[PedidosController::class,'formPedido'])->name('pedidos.form');

Route::get('/user/changePassword',[UserController::class,'formChangePassword'])->name('formChangePassword');
Route::post('/user/changePassword',[UserController::class,'changePassword'])->name('changePassword');

//Busqueda
Route::post('/search',[ProductosController::class,'search'])->name('search');

//Inserta un pedido
Route::post('/setOrder',[PedidosController::class,'setOrder'])->name('pedidos.setOrder');

Route::get('/history',[PedidosController::class,'history'])->name('pedidos.history');
});


Route::post('/forgot/sendLink',[UserController::class,'sendlink'])->name('user.sendEmail');

Route::post('/forgot',[UserController::class,'reset'])->name('user.resetPassord');

Route::get('forgot/form',[UserController::class,'getPasswordForm'])->name('getPasswordForm');

Route::get('/forgot/password',[UserController::class,'getEmail'])->name('getEmailForm');





