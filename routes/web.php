<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;


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
Route::get('/', [PublicController::class,'welcome'])->name('welcome');

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //trash
    Route::get('/products/trash',[ProductController::class,'trash'])->name('products.trash')->middleware('ageChecker');
    Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/products/downloadPdf',[ProductController::class,'downloadPdf'])->name('products.Pdf');

    //cart
    Route::post('/add-to-cart', [CartController::class,'store'])->name('cart.store');
    Route::get('/cart-products', [CartController::class,'index'])->name('cart.products');
    Route::delete('cart-products/{id}',[CartController::class,'deleteIteam']);
});

require __DIR__.'/auth.php';




Route::middleware('auth')->prefix('admin')->group(function(){
//crude
Route::get('/about-us', [PublicController::class,'about'])->name('about');
Route::get('/contact',[PublicController::class,'contact']);
Route::get('/users',[PublicController::class,'users'])->name('users');

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::patch('/products/{id}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/users',[UserController::class,'index'])->name('users.index');

});


Route::get('/{slug}', [PublicController::class,'CategoryWiseProducts'])->name('category.products');
Route::get('/products/{slug}',[PublicController::class,'productDetails'])->name('product.details');

//trash
// Route::middleware('auth')->group(function(){

// });
