<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/get/{categoriaId}',[ProductosController::class,'getProducts'])->name('getProducts');

Route::get('/categorias/get/',[ProductosController::class,'getCategorias'])->name('getCategorias');

Route::post('/search',[ProductosController::class,'search'])->name('search');

Route::post('/setOrder',[ProductosController::class,'setOrder'])->name('setOrder');


