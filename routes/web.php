<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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


//crude
Route::get('/about-us', [PublicController::class,'about'])->name('about');
Route::get('/contact',[PublicController::class,'contact']);
Route::get('/users',[PublicController::class,'users'])->name('users');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::patch('/products/{id}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');
