<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\Auth\Logout;



Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login', [LoginController::class,'showlogin'])->name("showlogin");
Route::post('auth/login', [LoginController::class,'login'])->name("login");
Route::get('auth/logout',Logout::class)->name("logout");

Route::prefix('admin')->name('admin.')->middleware(CheckLogin::class)->name('admin.')->group(function () {
    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
        Route::post('upload-file/{id}', 'uploadFile')->name('uploadFile');
        Route::get('delete-file/{id}', 'deleteFile')->name('deleteFile');

    });
    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
});