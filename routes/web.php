
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockMovementController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class)
    ->except(['show']);

Route::resource('suppliers', SupplierController::class)
    ->except(['show']);

Route::resource('stock-movements', StockMovementController::class)
    ->only(['index', 'create', 'store']);
