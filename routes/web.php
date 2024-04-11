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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/wishes', 'Admin\WishController@index')->name('wishes.index');
    Route::get('/children', 'Admin\ChildController@index')->name('children.index');
    Route::get('/donors', 'Admin\DonorController@index')->name('donors.index');
    Route::get('/guardians', 'Admin\GuardianController@index')->name('guardians.index');
    // Other admin routes
});