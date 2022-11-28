<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/view/{category}', [App\Http\Controllers\CategoryController::class, 'view'])->name('category.view');
Route::get('/category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
Route::get('/lots', [App\Http\Controllers\LotsController::class, 'index'])->name('lot.index');
Route::get('/lot/add', [App\Http\Controllers\LotsController::class, 'add'])->name('lot.add');
Route::post('/lot/store', [App\Http\Controllers\LotsController::class, 'store'])->name('lot.store');
Route::get('/lot/view/{lot}', [App\Http\Controllers\LotsController::class, 'view'])->name('lot.view');
Route::get('/lot/edit/{lot}', [App\Http\Controllers\LotsController::class, 'edit'])->name('lot.edit');
Route::post('/lot/{lot}', [App\Http\Controllers\LotsController::class, 'update'])->name('lot.update');
Route::delete('/lot/{lot}', [App\Http\Controllers\LotsController::class, 'delete'])->name('lot.delete');;



