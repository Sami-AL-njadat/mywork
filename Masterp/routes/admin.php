<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminLoginController;
  
use App\Http\Controllers\CartsController;




Route::resource('category', CategoriesController::class)->middleware('isLoggedIn');
Route::resource('users', UsersController::class)->middleware('isLoggedIn');
Route::resource('product', ProductsController::class)->middleware('isLoggedIn');
Route::resource('admins', AdminsController::class)->middleware('isLoggedIn');
Route::resource('message', ContactController::class)->middleware('isLoggedIn');


Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('loginprocess', [AdminLoginController::class, 'login'])->name('loginprocess');
Route::get('admin/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard')->middleware('isLoggedIn');

Route::get('admin/profile', [AdminController::class, 'show'])->name('admin.profile')    ;

Route::post('admin/profile/update/{id}', [AdminController::class, 'update'])->name('admin.profile.update');

Route::get('admin/profile/reset', [AdminController::class, 'resetPasswordPage'])->name('admin.profile.reset');

Route::post('admin/profile/resetpass', [AdminController::class, 'resetPassword'])->name('admin.profile.resetpassword');

Route::get('admin/profile/logout', [AdminLoginController::class, 'logout'])->name('logoutprocess');

Route::get('not_logged_in', function () {
    return view('Admin.pages.login.loginAdmin');
})->name('alert');