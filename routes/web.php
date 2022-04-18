<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\LoginCheck;
use App\Models\Category;
use App\Models\Phone;
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

Route::get('/login', [LoginController::class, 'login'])->name('admin.login.view');
Route::post('login', [LoginController::class, 'index'])->name('login.admin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout.admin');

Route::prefix('admin')->middleware('login_check')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('{category}', [CategoryController::class, 'showCategory'])->name('admin.category.show');
        Route::post('update/{category}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('delete', [CategoryController::class, 'delete'])->name('admin.category.delete'); 
        Route::put('update-status', [CategoryController::class, 'updateStatus'])->name('admin.update.status');
    });

    // Phone product
    Route::prefix('phones')->group(function(){
        Route::get('/', [PhoneController::class, 'index'])->name('admin.phones');
        Route::get('add', [PhoneController::class, 'create'])->name('admin.create.phone');
        Route::post('store', [PhoneController::class, 'store'])->name('admin.store.phone'); 
        Route::put('update-status', [PhoneController::class, 'updateStatus'])->name('admin.phone.update.status');
        Route::get('{phone}', [PhoneController::class, 'showPhone'])->name('admin.phone.show'); 
        Route::post('update/{phone}', [PhoneController::class, 'update'])->name('admin.phone.update');
        Route::delete('delete',[PhoneController::class, 'delete'])->name('admin.phone.delete');
    });

    // User 
    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::put('update-status',[UserController::class, 'updateStatus'])->name('admin.user.status');
        Route::get('add', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('update/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('delete',[UserController::class, 'delete'])->name('admin.user.delete');
    });
});
