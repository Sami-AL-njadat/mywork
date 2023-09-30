<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartsController;

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

// Route::get('/', [CategoriesController::class, 'index']);;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('contact', [ContactController::class, 'shoow'])->name('contact');;
Route::get('/', [CategoriesController::class, 'index'])->name('home');


Route::get('contact', [ContactController::class, 'showContact'])->name('show.contact');
Route::post('store-contact', [ContactController::class, 'store'])->name('store.contact');


 
Route::get('/about', function () {
    return view('pagess.aboutUs.aboutus');
})->name('about');


Route::get('/myacc', function () {
    return view('pagess.profile1.porfile');
})->name('myacc');

// Route::get('/shop', function () {
//     return view('pagess.shop.shop');
// })->name('shop');



Route::get('/shopdetai', function () {
    return view('pagess.shop.shopDetailes');
})->name('shopdetai');

Route::get('/checkOut', function () {
    return view('pagess.shop.checkOut');
})->name('checkOut');

 

Route::get('/cart', [CartsController::class, 'show'])->name('cart');
Route::get('/shop/{id?}', [CategoriesController::class, 'showProduct'])->name('shop');
Route::get('/products', [CategoriesController::class , 'showProduct'])->name('products.index');
Route::get('/shopdetai/{id?}', [CategoriesController::class, 'shopdetai'])->name('shopdetai');
