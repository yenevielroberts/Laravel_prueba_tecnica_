<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Models\Pedido;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcomPage');



Route::get('/login',[UserController::class,'loginVista'])->name('show.login');

Route::get('/signup',[UserController::class,'vistaRegistro'])->name('registroVista');
//Obtengo todas las categorias
Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

//Obtengo todos los prodcutos
Route::get('/products/get/type',[ProductosController::class,'getAllProductos'])->name('getAllProductos');

//Productos por categorias
Route::get('/products/get',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

Route::get('/pedido/create',[PedidosController::class,'formPedido'])->name('pedidos.form');

Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/signup',[UserController::class,'registro'])->name('registro');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

//Busqueda
Route::post('/search',[ProductosController::class,'search'])->name('search');

//Inserta un pedido
Route::post('/setOrder',[PedidosController::class,'setOrder'])->name('pedidos.setOrder');

Route::get('/history',[PedidosController::class,'history'])->name('pedidos.history');



