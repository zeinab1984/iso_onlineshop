<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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


Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard/users')->middleware(['auth'])->group( function () {
    Route::get('/show',[UserController::class,'showUsers'])->name('users.show');
    Route::get('/assignment_role/{user}',[UserController::class,'assignmentRole'])->name('users.assignment.role');
    Route::post('/store_role/{user}',[UserController::class,'storeRole'])->name('users.store.role');
    Route::get('/destroy/{user}',[UserController::class,'destroy'])->name('users.destroy');

});

Route::prefix('/categories')->group(function (){
    Route::get('/show/{category}',[HomeController::class,'showCategory'])->name('categories.show');
});

Route::get('cart',[HomeController::class,'Cart'])->name('cart.show');
Route::get('add-to-cart/{product}',[HomeController::class,'addToCart'])->name('add.to.cart');
Route::post('/update/{product}',[HomeController::class,'update'])->name('update.cart');
Route::get('/destroy/{product}',[HomeController::class,'destroy'])->name('destroy.cart');


Route::prefix('/order')->middleware(['auth'])->group(function () {
    Route::get('/show', [OrderItemController::class, 'show'])->name('order.show');
    Route::get('/create', [OrderItemController::class, 'create'])->name('order.create');
    Route::post('/store', [OrderItemController::class, 'store'])->name('order.store');
});


Route::prefix('/address')->middleware(['auth'])->group(function () {
    Route::get('/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/store', [AddressController::class, 'store'])->name('address.store');
});
Route::prefix('/transaction')->middleware(['auth'])->group(function () {
 Route::get('/', [TransactionController::class, 'index'])->name('transaction.index');
 Route::get('/show', [TransactionController::class, 'show'])->name('transaction.show');
Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');
});



Route::prefix('dashboard/categories')->middleware(['auth'])->group(function (){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::post('/update/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::get('/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
});


Route::prefix('dashboard/products')->middleware(['auth'])->group(function (){
    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');
    Route::post('/update/{product}',[ProductController::class,'update'])->name('products.update');
    Route::get('/edit/{product}',[ProductController::class,'edit'])->name('products.edit');
    Route::get('/destroy/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/myorders', [UserController::class, 'myOrders'])->name('user.myorders');
});

require __DIR__.'/auth.php';

