<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ReviwesController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventesController;




Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('admin/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('category', CategoriesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('product', ProductsController::class);
    Route::resource('admins', AdminsController::class);
    Route::resource('message', ContactController::class);
    Route::resource('coupons', CouponsController::class);
    Route::resource('review', ReviwesController::class);
    Route::resource('orders', OrderItemsController::class);
    Route::resource('event', EventController::class);
    Route::resource('eventes', EventesController::class);
});



// Route::post('/loginadmin', [AdminLoginController::class,'login'])->name('loginadmin');


Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('loginprocess', [AdminLoginController::class, 'login'])->name('loginprocess');

Route::get('/adminprofile', [AdminsController::class, 'show'])->name('adminProfile');

Route::post('update/{id?}', [AdminsController::class, 'update'])->name('admin.profile.update');

Route::get('reset', [AdminsController::class, 'resetPasswordPage'])->name('admin.profile.reset');

Route::post('resetpass', [AdminsController::class, 'resetPassword'])->name('admin.profile.resetpassword');

Route::get('admin/profile/logout', [AdminLoginController::class, 'logout'])->name('logoutprocess');

Route::get('not_logged_in', function () {
    return view('Admin.pages.login.loginAdmin');
})->name('alert');