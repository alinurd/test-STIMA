<?php

use App\Http\Controllers\AdminContoller;
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
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
});
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'isUser']], function () {
    Route::get('/', [UserController::class, 'index']);
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
