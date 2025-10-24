<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[UserController::class,'loginVista'])->name('loginVista');

Route::get('/signup',[UserController::class,'vistaRegistro'])->name('registroVista');

Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');


Route::get('/products/get',[ProductosController::class,'getAllProductos'])->name('getAllProductos');

Route::get('/products/get/{categoriaId}',[ProductosController::class,'getProductsByCategoria'])->name('productCategoria');

Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/signup',[UserController::class,'registro'])->name('registro');

Route::post('/search',[ProductosController::class,'search'])->name('search');

Route::post('/setOrder',[ProductosController::class,'setOrder'])->name('setOrder');



