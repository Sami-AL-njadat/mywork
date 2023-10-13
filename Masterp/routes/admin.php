<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\CartsController;




Route::resource('category', CategoriesController::class);
Route::resource('users', UsersController::class);