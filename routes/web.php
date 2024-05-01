<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WishController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\GuardianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChildWishController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CartController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'welcomindex']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/public-wishes', [HomeController::class, 'publicwish'])->name('publicwish');
Route::get('/public-wishes/{catis}', [HomeController::class, 'getWishesByCategory'])->name('category.wishes');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

// routes/web.php
Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession']);
// routes/web.php
Route::get('/checkout/success', [StripeController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [StripeController::class, 'checkoutCancel'])->name('checkout.cancel');



Auth::routes();

Route::get('/dashboard', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // Assuming 'dashboard' is the name of your dashboard route
    } else {
        return redirect()->route('login'); // Redirect to login if user is not logged in
    }
});

Route::group(['middleware' => 'auth', 'guardian'], function () {
Route::get('/add-child', [ChildrenController::class, 'create'])->name('addChild');
Route::post('/add-child', [ChildrenController::class, 'store'])->name('storeChild');
Route::get('/create-wish/{child_id}', [ChildWishController::class, 'create'])->name('createWish');
Route::post('/create-wish', [ChildWishController::class, 'store'])->name('storeWish');

    Route::get('/edit-wish/{wish_id}', [ChildWishController::class, 'editwish'])->name('editWish');
    Route::put('/update-wish/{wish_id}', [ChildWishController::class, 'updatewish'])->name('updateWish');

    Route::get('/edit-child/{child_id}', [ChildrenController::class, 'edit'])->name('editChild');
    Route::put('/update-child/{child_id}', [ChildrenController::class, 'update'])->name('updateChild');



});

Route::get('/credit-card', [CreditCardController::class, 'checkCreditCard'])->name('credit-card.check');


Route::get('/my-donors', [DonorsController::class, 'index'])->name('donors.index');
//Route::get('/donors/create', [DonorsController::class, 'create'])->name('donors.create');
//Route::post('/donors', [DonorsController::class, 'store'])->name('donors.store');
//Route::get('/donors/{donor}', [DonorsController::class, 'show'])->name('donors.show');
//Route::get('/donors/{donor}/edit', [DonorsController::class, 'edit'])->name('donors.edit');
//Route::put('/donors/{donor}', [DonorsController::class, 'update'])->name('donors.update');
//Route::delete('/donors/{donor}', [DonorsController::class, 'destroy'])->name('donors.destroy');
Route::post('/add-card', [StripeController::class , 'addCard'])->name('add.card');




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'admin'], function () {
    Route::get('/wishes', [WishController::class , 'index'])->name('wishes.index');
    Route::get('/children', [ChildController::class , 'index'])->name('children.index');
    Route::get('/donors', [DonorController::class , 'index'])->name('donors.index');
    Route::get('/guardians', [GuardianController::class , 'index'])->name('guardians.index');
    // Other admin routes

});

 Route::get('/get-wishes', [WishController::class, 'getWishes'])->name('get-wishes');
 
