<?php

use App\Http\Controllers\Product\Actions\ProductDestroyActionController;
use App\Http\Controllers\Product\Actions\ProductStoreActionController;
use App\Http\Controllers\Product\Actions\ProductUpdateActionController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])
        ->name('product.index');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])
        ->name('product.edit');
    Route::get('/create', [ProductController::class, 'create'])
        ->name('product.create');
    Route::post('/', [ProductStoreActionController::class, '__invoke'])
        ->name('product.store');
    Route::delete('/{product}/delete', [ProductDestroyActionController::class, '__invoke'])
        ->name('product.destroy');
    Route::put('/{product}/update', [ProductUpdateActionController::class, '__invoke'])
        ->name('product.update');
});
