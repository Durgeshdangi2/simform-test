<?php

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
    return redirect('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    /**
     * dashboard routes
     */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /**
     * users routes
     */
    Route::get('users/all', [App\Http\Controllers\UserController::class, 'all'])->name('users.all');
    Route::resource('users', App\Http\Controllers\UserController::class);
    /**
     * expense-management routes
     */
    Route::get('expense-management/all', [App\Http\Controllers\ExpenseManagementController::class, 'all'])->name('expense-management.all');
    Route::resource('expense-management', App\Http\Controllers\ExpenseManagementController::class);
});
