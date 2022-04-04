<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => IsAdminMiddleware::class], function () {
    Route::get('/adminDashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/createItem', [AdminController::class, 'createItem'])->name('createItem');
    Route::post('/create', [AdminController::class, 'create'])->name('create');
    Route::get('/updateItem/{id}', [AdminController::class, 'updateItem'])->name('updateItem');
    Route::patch('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{id}',[AdminController::class, 'delete'])->name('delete');
});

Route::get('/userPage', [AdminController::class, 'userPage'])->name('userPage');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/view', [AdminController::class, 'view'])->name('view');

Route::get('/cari', [AdminController::class, 'cari'])->name('cari');

Route::post('/addToCart/{id}', [AdminController::class, 'addToCart'])->name('addToCart');



