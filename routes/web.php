<?php

use App\Http\Controllers\AdminContoller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [AdminContoller::class, 'index']);
    Route::get('/product/list', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    // Route::get('/destroy/{id}', [OutletController::class, 'destroy'])->name('hapus');

// Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    
});
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'isUser']], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/order/create/{id}', [OrderController::class, 'create'])->name('order.create');

});


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->middleware('isAdmin');
//     Route::get('/home', [UserController::class, 'index'])->middleware('isUser');
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
