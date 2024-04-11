<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WishController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\GuardianController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'admin'], function () {
    Route::get('/wishes', [WishController::class , 'index'])->name('wishes.index');
    Route::get('/children', [ChildController::class , 'index'])->name('children.index');
    Route::get('/donors', [DonorController::class , 'index'])->name('donors.index');
    Route::get('/guardians', [GuardianController::class , 'index'])->name('guardians.index');
    // Other admin routes
});