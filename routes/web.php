<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
   return redirect('menu');
});

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/create', [MenuController::class, 'create']);
Route::post('/menu/store', [MenuController::class, 'store']);

Route::get('/menu/{id}/edit', [MenuController::class, 'edit']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

Route::get('/kategori', [CategoryController::class, 'index']);
Route::get('/kategori/create', [CategoryController::class, 'create']);
Route::post('/kategori/store', [CategoryController::class, 'store']);
Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/kategori/{id}', [CategoryController::class, 'update']);
Route::delete('/kategori/{id}', [CategoryController::class, 'destroy']);
