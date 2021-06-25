<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class,'index']);

Route::get('/login',[AuthController::class,'index'])->name('login.index');
Route::get('/register',[AuthController::class,'register_index'])->name('register.register');
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login'])->name('login.login');
Route::get('/logout',[AuthController::class,'logout']);

Route::middleware(['auth.allow'])->group(function () {
        Route::prefix('admin')->group(function () {
        Route::post('/product/store',[ProductController::class,'store'])->name('admin.store');
        Route::post('/product/{id}',[ProductController::class,'update'])->name('admin.update');
        Route::get('/product/create',[ProductController::class,'create'])->name('admin.create'); 
        Route::get('/product',[ProductController::class,'admin_view'])->name('admin.product');    
        Route::get('/product/{id}',[ProductController::class,'show'])->name('admin.show');    
        Route::get('/product/{product}/delete',[ProductController::class,'delete'])->name('admin.delete');

            
    });
});
