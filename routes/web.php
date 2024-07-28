<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/store', function () {
    return view('client.pages.store');
});

Route::middleware(['auth'])
    ->prefix('/')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.admin', 'auth'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.index');
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
Route::get('/form', function () {
    return view('admin.pages.form');
});
Route::get('/blank-page', function () {
    return view('admin.pages.blank-page');
});
Route::get('/ui-card', function () {
    return view('admin.pages.ui-card');
});
Route::get('/ui-typography', function () {
    return view('admin.pages.ui-typography');
});
Route::get('/button', function () {
    return view('admin.pages.ui-buttons');
});
