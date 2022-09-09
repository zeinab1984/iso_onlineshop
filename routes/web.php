<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('front.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

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
require __DIR__.'/auth.php';

