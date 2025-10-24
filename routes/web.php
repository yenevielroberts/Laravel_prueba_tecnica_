<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[UserController::class,'loginVista'])->name('loginVista');

Route::get('/signup',[UserController::class,'vistaRegistro'])->name('registroVista');
//Obtengo todas las categorias
Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

//Obtengo todos los prodcutos
Route::get('/products/get/type',[ProductosController::class,'getAllProductos'])->name('getAllProductos');

//Productos por categorias
Route::get('/products/get',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/signup',[UserController::class,'registro'])->name('registro');

//Busqueda
Route::post('/search',[ProductosController::class,'search'])->name('search');

//Inserta un pedido
Route::post('/setOrder',[ProductosController::class,'setOrder'])->name('setOrder');



