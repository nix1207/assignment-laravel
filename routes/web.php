<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Middleware\LoginCheck;
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

Route::get('/', function () {
    return view('admin.login');

})->name('admin.login.view');
Route::post('login', [LoginController::class, 'index'])->name('login.admin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout.admin');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard')->middleware('login_check');

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('{category}', [CategoryController::class, 'showCategory'])->name('admin.category.show');
        Route::post('update/{category}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('delete', [CategoryController::class, 'delete'])->name('admin.category.delete'); 
    });

    // Phone product
});
