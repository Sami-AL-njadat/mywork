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



// Route::get('/shopdetai', function () {
//     return view('pagess.shop.shopDetailes');
// })->name('shopdetai');




Route::get('/shop/filterByPrice', [CategoriesController::class, 'filterByPrice'])->name('shop.filterByPrice');
// Route::get('/shop/showProduct/{id?}', [CategoriesController::class, 'showProduct'])->name('shop.showProduct');

Route::get('/shop/{id?}', [CategoriesController::class, 'showProduct'])->name('shop');
Route::get('/products', [CategoriesController::class, 'showProduct'])->name('products.index');
Route::get('/shopdetai/{id?}', [CategoriesController::class, 'shopdetai'])->name('shopdetai');



Route::get('/cart', [CartsController::class, 'show'])->name('cart.index');
Route::get('cart/{id?}', [CartsController::class, 'store'])->name('cartstor');
Route::get('carttt/{id?}', [CartsController::class, 'storee'])->name('cartstoree');
// Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
Route::get('delete/{id?}', [CartsController::class, 'destroy'])->name('cart.destroy');
Route::get('add/{id?}', [CartsController::class, 'add'])->name('cart.add');
Route::get('remove/{id?}', [CartsController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CategoriesController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::post('/coupon', [CartsController::class, 'coupon'])->name('coupon');
