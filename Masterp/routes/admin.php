<?php

<<<<<<< HEAD
 

 use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
=======
 use App\Http\Controllers\ProfileController;
>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ReviwesController;
<<<<<<< HEAD
=======
use App\Http\Controllers\OrderItemsController;
>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c
use App\Http\Controllers\CartsController;




<<<<<<< HEAD
 
=======
Route::get('admin/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard')->middleware('isLoggedIn');

>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c

Route::resource('category', CategoriesController::class)->middleware('isLoggedIn');
Route::resource('users', UsersController::class)->middleware('isLoggedIn');
Route::resource('product', ProductsController::class)->middleware('isLoggedIn');
Route::resource('admins', AdminsController::class)->middleware('isLoggedIn');
Route::resource('message', ContactController::class)->middleware('isLoggedIn');
Route::resource('coupons', CouponsController::class)->middleware('isLoggedIn');
Route::resource('review', ReviwesController::class)->middleware('isLoggedIn');
<<<<<<< HEAD
=======
Route::resource('orders', OrderItemsController::class)->middleware('isLoggedIn');


// Route::post('/loginadmin', [AdminLoginController::class,'login'])->name('loginadmin');
>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c


Route::post('/login/admin', [AdminLoginController::class,'login'])->name('loginadmin');
 

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('loginprocess', [AdminLoginController::class, 'login'])->name('loginprocess');

<<<<<<< HEAD
Route::get('profile/admin', [AdminsController::class, 'show'])->name('admin.profile');
=======
Route::get('/adminprofile', [AdminsController::class, 'show'])->name('adminProfile');
>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c

Route::post('update/{id?}', [AdminsController::class, 'update'])->name('admin.profile.update');

Route::get('reset', [AdminsController::class, 'resetPasswordPage'])->name('admin.profile.reset');

Route::post('resetpass', [AdminsController::class, 'resetPassword'])->name('admin.profile.resetpassword');

Route::get('admin/profile/logout', [AdminLoginController::class, 'logout'])->name('logoutprocess');

Route::get('not_logged_in', function () {
    return view('Admin.pages.login.loginAdmin');
})->name('alert');
<<<<<<< HEAD

 
=======
>>>>>>> e15611dcaeb2d2a0f21c4258193c530cc0f6703c
